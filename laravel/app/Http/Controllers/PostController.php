<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->id();
        $post->username = auth()->user()->name;
        $post->save();

        return redirect()->route('blog')->with('success', '記事を作成しました！');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $post->delete();
        return redirect()->route('blog')->with('success', '記事を削除しました！');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('post_detail', ['id' => $post->id])->with('success', '記事を更新しました！');
    }


    
}
