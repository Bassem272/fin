<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::apiResource('art', ArtController::class);
// Route::get('/art',"ArtController@index");
Route::get('/art', [ArtController::class, 'index']);
Route::get('/art/{id}', [ArtController::class, 'showOne']);
Route::post('/art', [ArtController::class, 'store']);
Route::put('/art/{id}', [ArtController::class, 'update']);
Route::delete('/art/{id}', [ArtController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'showOne']);
// Route::get('/users/csrf', [UserController::class, 'getCsrfToken']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
