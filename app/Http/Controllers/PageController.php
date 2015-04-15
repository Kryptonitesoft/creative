<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {


    public function index()
    {
        return view('pages.home');
    }


    public function gallery(){
        return view('pages.gallery');
    }


    public function docs(){
        return view('pages.docs');
    }


    public function results(){
        return view('pages.results');
    }


    public function about(){
        return view('pages.about');
    }


    /**
     * @return \Illuminate\View\View
     * communication logic here.
     */
    public function contact(){
        return view('pages.contact');
    }


}
