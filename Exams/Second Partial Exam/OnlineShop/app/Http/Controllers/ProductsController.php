<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use function Psy\debug;

class ProductsController extends Controller
{
    public function home()
    {
        $products = Product::all();
        $discountProduct = null;
        foreach ($products as $product) {
            if ($discountProduct === null) {
                $discountProduct = $product;
                continue;
            }
            if ($discountProduct['required_number'] > $product['required_number'])
                $discountProduct = $product;
        }
        return redirect('/products/' . $discountProduct['slug']);
    }

    public function current()
    {
        $products = Product::all();
        $currentProducts = $products->filter(function ($product) {
            return count($product->preorders) < $product['required_number'];
        })->values();
        $products = $currentProducts;
        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->toArray();
        $sorted = Arr::sort($products, function ($product) {
            return $product['required_number'];
        });
        $products = $sorted;
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $product = $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product['required_number'] = 0;
        Product::create($product);
        return redirect('products')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product', 'slug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function update(Request $request, $slug)
    {
        //
        $product = Product::where('slug', $slug)->first();
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product->name = $request->get("name");
        $product->slug = $request->get("slug");
        $product->image = $request->get("image");
        $product->description = $request->get("description");
        $product->price = $request->get("price");
        $product->save();
        return redirect('products')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->delete();
        return redirect('products')->with('success', 'Product has been deleted');
    }
}
