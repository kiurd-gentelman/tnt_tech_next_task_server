<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return response()->json('posts',$posts);
    }

    public function store(Request $request)
    {
        $insert = $request->validate([
            'title'=>'require',
            'description'=>'require',
        ]);

        $insert = Post::create($insert + ['author_id'=>auth()->id()]);
        $message= [
            'message'=> 'success',
            'result' => $insert
        ] ;

        return response()->json($message,200);
    }

    public function show($post_id)
    {
        $post = Post::find($post_id)->with('comments');
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
