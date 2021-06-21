<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $insert = $request->validate([
            'comments' => 'require',
            'post_id' => 'require',
            'user_id' => 'require',
        ]);

        $insert = Comments::create($insert);
        $message= [
            'message'=> 'success',
            'result' => $insert
        ] ;

        return response()->json($message,200);
    }

    public function edit($id){
        $comment = Comments::find($id);
        $message= [
            'message'=> 'success',
            'result' => $comment
        ] ;

        return response()->json($message,200);
    }

    public function update(Request $request ,$comment_id){
         $request->validate([
            'comments' => 'require',
        ]);

        $insert = Comments::find($comment_id);
        $insert->comments = $request->comments;
        $insert->save();
        $message= [
            'message'=> 'success',
            'result' => $insert
        ] ;

        return response()->json($message,200);
    }

    public function delete($comment_id){
        $insert = Comments::find($comment_id);
        $insert->delete();

        $message= [
            'message'=> 'success',
        ] ;
        return response()->json($message,200);
    }

}
