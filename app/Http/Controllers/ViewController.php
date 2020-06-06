<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function frontend(){
        return view('welcome');
    }
    public function backend(){
        return view('dashboard');
    }
}
