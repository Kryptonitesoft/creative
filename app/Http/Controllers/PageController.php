<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

use Illuminate\Http\Request;

class PageController extends Controller {


    public function index(){
        return view("pages.home")->with("pageTitle", "Creative Coaching");
    }


    public function gallery(){
        return view("pages.gallery")->with("pageTitle", "Gallery");
    }


    public function documents(){
        return view("pages.documents")->with(["pageTitle"=>"Documents", "pnm"=>[]]);
    }


    public function results(){
        return view("pages.results")->with("pageTitle", "Results");
    }

    public function blog() {
        return view("pages.blog")->with("pageTitle", "Blog");
    }


    public function about(){
        $teachers = Teacher::all();
        return view("pages.about")->with(["pageTitle"=>"About", "teachers"=>$teachers]);
    }

    public function developers() {
        return view("pages.developers")->with("pageTitle", "Developers");
    }
    
}
