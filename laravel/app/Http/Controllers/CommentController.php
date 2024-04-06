<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->user_id = auth()->id();
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'コメントを投稿しました！');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        
        return back()->with('success', 'コメントが削除されました');
    }

    
}
