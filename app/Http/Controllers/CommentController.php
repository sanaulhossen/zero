<?php

namespace App\Http\Controllers;


use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $blog_id){

        $this->validate($request,['comment' => 'required|max:1000']);

        $comment = new Comment();
        $comment->blog_id = $blog_id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success_status', 'Your comment added successfully!');
    }
}
