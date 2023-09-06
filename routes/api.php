<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderItemController;
use App\Models\User;

// use App\Http\Controllers\EmailVerificationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//
// Route::apiResource('artist', ArtistController::class);
// Route::apiResource('category', CategoryController::class);
// Route::apiResource('comment', CommentController::class);
// Route::apiResource('contact', ContactController::class);
// Route::apiResource('order', OrderController::class);
// Route::apiResource('product', ProductController::class);
// Route::apiResource('product_image', ProductImageController::class);
// Route::apiResource('product_type', ProductTypeController::class);
// Route::get('/art',"ArtController@index");
// Route::apiResource('art', ArtController::class);


Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/revoke-tokens', 'AuthController@revokeTokens');
// User registration
Route::post('/register', [AuthController::class, 'register']);

// User login
Route::post('/login', [AuthController::class, 'login']);

// User logout (requires authentication)
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
// routes/web.php


Route::get('/verify-email/{code}', [AuthController::class, 'verifyEmail']);
Route::get('/send-mail',  [AuthController::class, 'sendTestMail']);

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orderItems', ProductImageController::class);
    Route::apiResource('orders', ProductTypeController::class);
    Route::apiResource('cart', ArtImageController::class);
   

});

Route::middleware(['auth:sanctum', 'customer'])->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orderItems', ProductImageController::class);
    Route::apiResource('orders', ProductTypeController::class);
    });
