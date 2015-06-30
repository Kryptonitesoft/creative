<?php namespace App\Http\Controllers;

use Input;
use App\Models\Post;
use App\Models\Archive;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArchivesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$archives = Archive::select('year')->distinct()->get();
		foreach($archives as $archive) {
			$archive['months'] = Archive::select('id', 'month')->where('year', $archive->year)->get()->toJson();
		}
		return $archives->toJson();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = Post::whereArchive_id($id)->paginate(Input::get('itemPerPage'));
        for($i=0; $i<count($posts); $i++) {
        	$post = $posts[$i];
        	$post = array_except($post, array("body"));
            $teacher  = Teacher::find($post->author_id);
            $category_id = CategoryPost::wherePost_id($post->id)->first()->category_id;
            $category = Category::find($category_id)->name;
            $post['category'] = $category;
            $post['author'] = $teacher->name;
            $post['fb'    ] = $teacher->fb  ;
        	$posts[$i] = $post;
        }
        return $posts;
	}

}