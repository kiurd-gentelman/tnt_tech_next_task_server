<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Auth::routes();
Route::get('all-post', [PostController::class , 'index']);
Route::get('/post-show/{id}', [PostController::class , 'show']);

Route::middleware(['api','auth:api'])->group(function () {
    // Get user info
    Route::get('/user', [LoginController::class ,'user']);
    // Logout user from application
    Route::post('/logout', 'Auth/LoginController@logout');
});