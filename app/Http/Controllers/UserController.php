<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(){
        $users = User::all();

        $message= [
            'message'=> 'success',
            'result' => $users
        ] ;
        return response()->json($message,200);
    }
    public function userOrderList(Request $request){
//        return $request->all();
        $users = User::orderBy($request->data,$request->order)->get();

        $message= [
            'message'=> 'success',
            'result' => $users
        ] ;
        return response()->json($message,200);
    }
    public function userSearch(Request $request){
//        return $request->all();
        $users = User::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('email', 'LIKE', "%{$request->search}%")
            ->orWhere('website' ,'LIKE',"%{$request->search}%")
            ->get();

        $message= [
            'message'=> 'success',
            'result' => $users
        ] ;
        return response()->json($message,200);
    }
}
