<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Teacher;
use App\Models\Archive;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Http\Requests\PostRequest;
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
        $posts = Post::paginate(Input::get('itemPerPage'));
        foreach($posts as $post) {
            $post = array_except($post, array("body"));
            $teacher  = Teacher::find($post->author_id);
            $category_id = CategoryPost::wherePost_id($post->id)->first()->category_id;
            $category = Category::find($category_id)->name;
            $post['category_id'] = $category_id;
            $post['category'   ] = $category;
            $post['author'     ] = $teacher->name;
            $post['fb'         ] = $teacher->fb  ;
        }
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $post = $request->all();
        $archive = Archive::whereYearAndMonth(date("Y"), date("n"))->first();
        if($archive) {
            $post['archive_id'] = $archive->id;
        } else {
            $newArchive = Archive::create(['year'=>date("Y"), 'month'=>date("n")]);
            $post['archive_id'] = $newArchive->id;
        }
        $post['slug'] = str_slug($post['title']);
        
        $post = Post::create($post);
        CategoryPost::create([
            'category_id' => $request->get("category_id"),
            'post_id' => $post->id
        ]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        $teacher = Teacher::find($post->author_id);
        $category_id = CategoryPost::wherePost_id($post->id)->first()->category_id;
        $category = Category::find($category_id)->name;
        $post['category_id'] = $category_id;
        $post['category'   ] = $category;
        $post['author'     ] = $teacher->name;
        $post['fb'         ] = $teacher->fb  ;
        if(!Auth::user()) $post->increment('views');
        return $post;
    }

    /**
     * @param Post $post
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        $posts = Post::where('archive_id', $post->archive_id)->get();
        if(sizeof($posts) <= 1) {
            $post->delete();
            Archive::find($post->archive_id)->delete();
        } else {
            $post->delete();
        }
    }

}
