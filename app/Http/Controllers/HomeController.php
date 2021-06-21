<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile_edit(){
        $profile_data = auth()->user();
        $message= [
            'message'=> 'success',
            'result' => $profile_data
        ] ;

        return response()->json($message,200);
    }
    public function profile_update(Request $request){
        $profile_data = User::find(auth()->id());
        $profile_data->name = $request->name;
        $profile_data->website = $request->website;
        $profile_data->save();

        $message= [
            'message'=> 'success',
            'result' => $profile_data
        ] ;

        return response()->json($message,200);
    }
}
