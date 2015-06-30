<?php namespace App\Http\Controllers;

use Input;
use App\Models\Post;
use App\Models\Teacher;
use App\Models\Archive;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ids = CategoryPost::select('category_id')->distinct()->get();
		$category = []; $i = 0;
		
		foreach ($ids as $id) {
			$category[$i++] = Category::find($id->category_id);
		}

		usort($category, function($a, $b){
		    return strcmp($a->name, $b->name);
		});

		return $category;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = CategoryPost::select('post_id')->whereCategory_id($id)->paginate(Input::get('itemPerPage'));
        for($i=0; $i<count($posts); $i++) {
        	$post = $posts[$i];
        	$post = Post::find($post->post_id);
			$post = array_except($post, array('body'));
	        $teacher = Teacher::find($post->author_id);
	        $category_id = CategoryPost::wherePost_id($post->id)->first()->category_id;
	        $category = Category::find($category_id)->name;
	        $post['category_id'] = $category_id;
	        $post['category'   ] = $category;
	        $post['author'     ] = $teacher->name;
	        $post['fb'         ] = $teacher->fb  ;
        	$posts[$i] = $post;
        }
        return $posts;
	}
}
