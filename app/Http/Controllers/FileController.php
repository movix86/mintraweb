<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function admin_sliders(){
        return view('home.admin-sliders');
    }
}
