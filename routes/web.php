<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Route::middleware("auth")->group(function (){
    Route::post('/logout',[AuthController::class,"logout"])->name("logout");

    Route::get('/user',[UserController::class,"index"])->name("Users.index");
    Route::get('/user/create',[UserController::class,"create"])->name("Users.create");
    Route::post('/user',[UserController::class,"store"])->name("Users.store");
    Route::get('/user/edit/{User}',[USerController::class,"edit"])->name("Users.edit");
    Route::put('/user/{User}',[UserController::class,"update"])->name("Users.update");
    Route::get('/user/show/{User}',[UserController::class,"show"])->name("Users.show");
    Route::delete('/user/{User}',[UserController::class,"destroy"])->name("Users.destroy");

    Route::get('/post',[PostController::class,"index"])->name("Posts.index");
    Route::get('/post/create',[PostController::class,"create"])->name("Posts.create");
    Route::post('/post',[PostController::class,"store"])->name("Posts.store");
    Route::get('/post/edit/{Post}',[PostController::class,"edit"])->name("Posts.edit");
    Route::put('/post/{Post}',[PostController::class,"update"])->name("Posts.update");
    Route::get('/post/show/{Post}',[PostController::class,"show"])->name("Posts.show");
    Route::delete('/post/{Post}',[PostController::class,"destroy"])->name("Posts.destroy");
});
Route::middleware("guest")->group(function (){
    Route::get('/',[AuthController::class,"loginform"])->name("login");
    Route::post('/',[AuthController::class,"login"]);
});


