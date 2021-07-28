<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCoursesController extends Controller
{
    public function home(){
        return view('home.home_courses');
    }
}
