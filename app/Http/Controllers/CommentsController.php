<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=> 'store']);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request,array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));
        $post= Post::find($post_id);
        $comment= new Comment();

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();  

        $request->Session()->flash('success', 'Comment was added');

        return redirect()->route('blog.single', [$post->slug]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view ('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request,array(
            'comment'=> 'required'
        ));

        $comment->comment = $request->comment;
        $comment->save();

        $request->session()->flash('success', 'Comment Updated Successfully');

        return redirect()->route('posts.show', $comment->post->id);
    }
    public function delete($id)
    {
        $comment = Comment::find($id);

        return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        $request->session()->flash('success', 'Comment Deleted successfully');
        return redirect()->route('posts.show', $post_id);
    }
}
