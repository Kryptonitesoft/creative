<?php

// Model binding
Route::model('files'     , 'App\Models\Fileentry' );
Route::model('teachers'  , 'App\Models\Teacher'   );
Route::model('exams'     , 'App\Models\Exam'      );
Route::model('results'   , 'App\Models\Result'    );
Route::model('blog'      , 'App\Models\Post'      );
Route::model('comments'  , 'App\Models\Comment'   );
Route::model('admissions', 'App\Models\Admission' );

Route::bind('files', function($value, $route){
	return App\Models\Fileentry::whereId($value)->first();
});

Route::bind('teachers', function($value, $route){
	return App\Models\Teacher::whereId($value)->first();
});

Route::bind('exams', function($value, $route){
	return App\Models\Exam::whereId($value)->first();
});

Route::bind('results', function($value, $route){
	return App\Models\Result::whereId($value)->first();
});

Route::bind('posts', function($value, $route){
	return App\Models\Post::whereId($value)->first();
});

Route::bind('comments', function($value, $route){
    return App\Models\Comment::whereId($value)->first();
});

Route::bind('admissions', function($value, $route){
    return App\Models\Admission::whereId($value)->first();
});

// Auth
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::controllers([
    'password' => 'Auth\PasswordController',
]);
Route::get('admin', [
	'as' => 'admin',
	'uses' => 'AdminController@index',
	'middleware' => 'admin'
]);

// Admin APIs
Route::group(['prefix' => 'api', 'middleware' => 'admin'], function(){
	//File Resource Routes
	Route::resource('files', 'FileEntryController', ['except' => ['create', 'edit']]);
	Route::post('files/upload', 'FileEntryController@upload');
	Route::post('files/changevisibility/{files}', 'FileEntryController@changeVisibility');

	//Exam Resource Routes
	Route::resource('exams', 'ExamsController', ['except' => ['create', 'edit']]);
	Route::resource('exams.results', 'ResultsController', ['except' => ['create', 'edit']]);

	//Blog Resource Routes
	Route::resource('posts', 'PostsController', ['except' => ['create', 'edit']]);
	Route::resource('posts.comments', 'CommentsController', ['except' => ['create', 'edit']]);

	//Teacher Resource Route
	Route::resource("teachers", "TeacherController", ['except' => ['create', 'edit']]);

	//Admission Resource Route
	Route::resource("admissions", "AdmissionsController", ['except' => ['create', 'edit']]);

	//Admin Routes
	Route::post("admin/update", "AdminController@update");
	Route::get("admin/changefilepassword/{pass?}", "AdminController@changeFilePassword");
	Route::get("admin/getinfo", "AdminController@getInfo");
	Route::get("admin/cleartemp", "AdminController@clearTemp");
});

// Guest Page Routes
Route::get('/', 'PageController@index');
Route::get('gallery', 'PageController@gallery');
Route::get('documents', 'PageController@documents');
Route::get('results', 'PageController@results');
Route::get('about', 'PageController@about');
Route::get('blog', 'PageController@blog');
Route::get('developers', 'PageController@developers');

// Guest APIs
// File
Route::get('files', 'FileEntryController@index');
Route::post('files/upload', 'FileEntryController@upload');
Route::post('files/download/{files}', 'FileEntryController@download');
Route::get('files/incrementhits/{files}', 'FileEntryController@incrementHits');

// Exam
Route::get('exams', 'ExamsController@index');
Route::get('exams/{exams}', 'ExamsController@show');

// Result
Route::get('exams/{exams}/results/{results?}', 'ResultsController@index');

// Blog Post
Route::get('posts', 'PostsController@index');
Route::get('posts/{posts}', 'PostsController@show');

// Blog Post Comment
Route::get('posts/{posts}/comments/{comments?}', 'CommentsController@index');
Route::post('posts/{posts}/comments/', 'CommentsController@store');

// Admision
Route::post('admissions', 'AdmissionsController@store');

// Category
Route::resource('categories', 'CategoriesController', ['only' => ['index', 'show']]);

// Archive
Route::resource('archives', 'ArchivesController', ['only' => ['index', 'show']]);