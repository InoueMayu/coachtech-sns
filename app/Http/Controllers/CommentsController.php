<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentsController extends Controller
{
    public function index()
    {
        $items = Comment::all();
        return response()->json([
            'data' => $items
        ], 200);
    }

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

    public function show (Comment $comment)
    {
        $item = Comment::find($comment);
        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
