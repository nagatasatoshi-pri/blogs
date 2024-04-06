<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostDetailController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blogContent', compact('post'));
    }
}
