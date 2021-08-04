<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;

class LikesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $items = Post::all();
        return response()->json([
            'data' => $items
        ], 200);
    }


    public function store(Request $request)
    {
        $item = Like::create($request->all());
        return response()->json([
            'data' => $like
        ], 201);

        // $like = new Like;
        // $like->post_id = $request->post_id;
        // $like->user_id = Auth::user()->id;
        // $like->save();
    }

    public function show (Like $like)
    {
        $item = Like::find($like);
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

    public function destroy(Like $like)
    {
        $item = Like::where('id',$like->id)->delete();
        if ($item){
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        // $like = Like::find($request->like_id);
        // $like->delete();
    }
}
