<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('api/index',[ApiController::class, 'index'])->name('index');
// Route::get('api/index/{id}',[ApiController::class, 'edit'])->name('edit');
// Route::post('api/create',[ApiController::class, 'store'])->name('create');
// Route::put('api/update{id}',[ApiController::class, 'update'])->name('update');
// Route::delete('api/delete',[ApiController::class, 'delete'])->name('delete');

Route::apiResource('users',ApiController::class);
