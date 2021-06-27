<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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
    Route::get('/user-list', [UserController::class ,'userList']);
    Route::post('/user/order-list', [UserController::class ,'userOrderList']);
    Route::post('/user/search', [UserController::class ,'userSearch']);
    Route::get('/user-post', [PostController::class ,'userPost']);
    Route::post('/post-create', [PostController::class ,'store']);
    Route::post('/post-update/{id}', [PostController::class ,'update']);
    Route::get('/post-delete/{id}', [PostController::class ,'delete']);


    Route::post('/comment-create', [CommentController::class ,'store']);
    Route::get('/comment-delete/{id}', [CommentController::class ,'delete']);
    // Logout user from application
//    Route::post('/logout', [LoginController::class .'logout']);
});
