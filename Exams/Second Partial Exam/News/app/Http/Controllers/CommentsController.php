<?php /** @noinspection PhpIncompatibleReturnTypeInspection */

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;

/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/news')->with('error', 'Bad request');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/news')->with('error', 'Bad request');
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
        $comment = $this->validate(request(), [
            'username' => 'required',
            'comment_text' => 'required',
            'news_id' => 'required|numeric'
        ]);
        Comment::create($comment);
        return redirect('/news/' . $request->get("news_id"))->with('success', 'Comment has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/news')->with('error', 'Bad request');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, Comment $comment)
    {
        $dbcomment = Comment::where('id', $comment->id)->first();
        $comment = $dbcomment;
        return view("comments.edit", compact('news'), compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, News $news, Comment $comment)
    {
        $this->validate(request(), [
            'username' => 'required',
            'comment_text' => 'required',
            'news_id' => 'required|numeric'
        ]);

        $dbcomment = Comment::where('id', $comment->id)->first();
        $dbcomment->comment_text = $request->get("comment_text");
        $dbcomment->save();

        return redirect('/news/' . $news->id)->with('success', 'Comment has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news, Comment $comment)
    {
        $dbcomment = Comment::where('id', $comment->id)->first();
        $dbcomment->delete();
        return redirect('/news/' . $news->id)->with('success', 'Comment has been deleted');
    }
}
