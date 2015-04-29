<?php namespace App\Http\Controllers;

use Redirect;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {


    protected $rules = [
        'body'  => 'required',
        'name'  =>  'required',
        'email' =>  'required'
    ];

    /**
     * @param Post $post
     */
	public function store(Post $post, Request $request)
	{
        $this->validate($request, $this->rules);
        $input = $request->all();
        $input['post_id'] = $post->id;
        Comment::create($input);
        $post->increment('comment_count');

        return Redirect::route('posts.show', $post->id)->with('message', 'Comment was saved');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Post $post, Comment $comment)
	{
        $comment->delete();
        $post->decrement('comment_count');
        return Redirect::route('posts.show', $post->id)->with('message', 'Comment deleted');
	}

}
