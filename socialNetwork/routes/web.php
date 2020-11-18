<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['auth:sanctum', 'verified'])->get('/', [homeController::class, 'renderHome']);

Route::get('/profile/{username}', [userController::class, 'renderUser']);



Route::post('/', [PostController::class, 'createPost']);
Route::get('/', [PostController::class, 'showPosts']);

Route::get('/profile', [userController::class, 'showProfile']);


Route::get('/addFriend/{username}', [FollowerController::class, 'addFriend']);
Route::post('/showUnfollowers', [FollowerController::class, 'showUnfollowed']);
