<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('users', 'App\Http\Controllers\UserController');
    Route::apiResource('posts', 'App\Http\Controllers\PostController');
    Route::apiResource('comments', 'App\Http\Controllers\CommentController');
    Route::apiResource('tags', 'App\Http\Controllers\TagController');
    Route::apiResource('categories', 'App\Http\Controllers\CategoryController');
});
