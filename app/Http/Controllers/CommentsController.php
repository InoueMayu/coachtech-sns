<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $item = Comment::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);

        // $comment = new Comment;
        // $comment->comment = $request->comment;
        // $comment->post_id = $request->post_id;
        // $comment->user_id = Auth::user()->id;
        // $comment->save();
    }
}
