<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Facade\Ignition\QueryRecorder\Query;

class PostController extends Controller
{
    public function index(Request $request){

        //dd($request->query('category'));
        if($request->query('category')){
            $posts = Post::where('category_id',$request->query('category'))->get();
        } else {
            $posts = Post::all();
        }

        return response()->json($posts);
    }

    public function show($slug){
        $post = Post::where("slug",$slug)->with(["category","tags","comments"])->first();
        if(empty($post)){
            return response()->json([
                "success" => false,
                "errors" => ["message"=>"Post not Found"]
            ], 404);
            //return response()->json(["message"=>"Post not Found"], 404);
        }
        return response()->json($post);
    }
}
