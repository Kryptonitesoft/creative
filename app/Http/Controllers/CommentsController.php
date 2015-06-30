<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Tests\RedirectResponseTest;

class CommentsController extends Controller {

    public function index(Post $post){
        return Comment::wherePost_id($post->id)
        			  ->orderBy("created_at", "desc")
        			  ->paginate(Input::get("itemPerPage"));
    }

    /**
     * @param Post $post
     */
	public function store(Post $post, CommentRequest $request)
	{
        $input = $request->all();
        $input['post_id'] = $post->id;
        Comment::create($input);
        $post->increment('comment_count');
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
	}

}
