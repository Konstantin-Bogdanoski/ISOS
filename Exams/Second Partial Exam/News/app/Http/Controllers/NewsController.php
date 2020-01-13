<?php /** @noinspection PhpIncompatibleReturnTypeInspection */

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class NewsController extends Controller
{
    /**
     * Display top news.
     *
     * @return Response
     */
    public function top()
    {
        $news = News::all();
        $news->sortBy('num_upvotes');
        $topNews = [$news[0], $news[1], $news[2]];
        $news = $topNews;
        return view('news.index', compact('news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $news = $this->validate(request(), [
            'news_description' => 'required',
            'news_link' => 'required|url',
            'news_title' => 'required|min:10',
            'created_at' => 'required|date',
            'num_upvotes' => 'required',
        ]);

        News::create($news);
        return redirect('/news')->with('success', 'News has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'news_description' => 'required',
            'news_link' => 'required|url',
            'news_title' => 'required',
            'num_upvotes' => 'required',
        ]);

        $news = News::where('id', $id->id)->first();
        $news->news_description = $request->get("news_description");
        $news->news_link = $request->get("news_link");
        $news->news_title = $request->get("news_title");
        $news->save();

        return redirect('/news')->with('success', 'News has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $news = News::where('id', $id->id)->first();
        $news->delete();
        return redirect('/news')->with('success', 'News has been deleted');
    }
}
