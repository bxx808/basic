<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $post = Post::latest()->first();
        return view('welcome', [
            'post' => $post
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}
