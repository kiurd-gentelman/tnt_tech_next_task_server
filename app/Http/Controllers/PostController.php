<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get()->toArray();
        $message= [
            'message'=> 'success',
            'result' => $posts
        ] ;

        return response()->json($message);
    }
    public function userPost(){
        $posts = Post::where('author_id' , auth()->id())
            ->get()
            ->toArray();
        $message= [
            'message'=> 'success',
            'result' => $posts
        ] ;

        return response()->json($message);
    }

    public function store(Request $request)
    {
        $insert = $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
//        return $insert;

        $insert = Post::create($insert + ['author_id'=>auth()->id()]);
        $message= [
            'message'=> 'success',
            'status' => 200
        ] ;

        return response()->json($message,200);
    }

    public function show($post_id)
    {
        $post = Post::with('comments')->find($post_id);
        $message= [
            'message'=> 'success',
            'result' => $post
        ] ;

        return response()->json($message,200);
    }

    public function edit($post_id)
    {
        $post = Post::find($post_id);
        $message= [
            'message'=> 'success',
            'result' => $post
        ] ;

        return response()->json($message,200);
    }

    public function update(Request $request ,$post_id)
    {
        $post = Post::find($post_id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        $message= [
            'message'=> 'success',
        ] ;

        return response()->json($message,200);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post ->delete();
        $message= [
            'message'=> 'success',
        ] ;

        return response()->json($message,200);
    }
}
