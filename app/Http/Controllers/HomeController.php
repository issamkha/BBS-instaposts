<?php

namespace App\Http\Controllers;

use App\Models\InstagramPosts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = InstagramPosts::orderBy('timestamp', 'desc')->get();
        return view('home', compact('posts',));
    }
}
