<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\HeavyMachine;
class HomeController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->take(4)->get();
        $heavy_machines=HeavyMachine::latest()->get();
        return view('index',compact('posts','heavy_machines'));
    }
}
