<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function about(){
        return view('home.about');
    }

    public function contact(){
        return view('home.contact');
    }

    public function privacy(){
        return view('home.privacy');
    }

    public function terms(){
        return view('home.terms');
    }

    public function courses(){
        return view('home.courses');
    }

    public function nysc(){
        return view('home.nysc');
    }
}
