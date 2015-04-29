<?php namespace App\Http\Controllers;

use Redirect;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = str_slug($post->title);
        $post->author_id = 1;
        $post->archive_id = 1;
        $post->save();

        return Redirect::route('posts.index')->with('message', 'Successfully post created');
    }

    /**
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * @param Post $post
     */
    public function update(Post $post, PostRequest $request)
    {
        $input = array_except($request->all(), '_method');
        $post->update($input);

        return Redirect::route('posts.show', $post->id)->with('message', 'Post successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index')->with('message', 'Post deleted');
    }

}
