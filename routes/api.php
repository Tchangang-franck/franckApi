<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Route::get('api/index',[ApiController::class, 'index'])->name('index');
// Route::get('api/index/{id}',[ApiController::class, 'edit'])->name('edit');
// Route::post('api/create',[ApiController::class, 'store'])->name('create');
// Route::put('api/update{id}',[ApiController::class, 'update'])->name('update');
// Route::delete('api/delete',[ApiController::class, 'delete'])->name('delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route from post
Route::get('/index', [PostController::class, 'index']);
Route::get('/show/{post}', [PostController::class, 'show']);
Route::post('/create_post', [PostController::class, 'store']);

//to have acces to this route if you aunthenticated 
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update', [PostController::class, 'update']);
    Route::delete('/delete', [PostController::class, 'delete']);
});


//Route from user
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', ApiController::class);
});
//Route to register an log user 
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
