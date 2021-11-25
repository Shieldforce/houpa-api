<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

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

Route::prefix("auth")->name("api.auth.")->group(function () {
    
    Route::post("/login", [ AuthController::class, "login" ])
    ->name("login");

});

Route::middleware(["apiJWT"])->name("api.")->group(function () {

    Route::middleware(["auth"])->prefix("auth")->name("auth.")->group(function () {
    
        Route::post("/logout", [ AuthController::class, "logout" ])
        ->name("logout");
        Route::post("/refresh", [ AuthController::class, "refresh" ])
        ->name("refresh");
        Route::post("/me", [ AuthController::class, "me" ])
        ->name("me");
    
    });

    Route::prefix("users")->name("users.")->group(function () {
    
        Route::get("/", [ UserController::class, "index" ])
        ->name("index");
    
    });

    Route::prefix("product")->name("product.")->group(function () {
    
        Route::get("/", [ ProductController::class, "index" ])
        ->name("index");
        Route::get("/show/{id?}", [ ProductController::class, "show" ])
        ->name("show");
        Route::post("/create", [ ProductController::class, "create" ])
        ->name("create");
        Route::post("/edit/{id?}", [ ProductController::class, "edit" ])
        ->name("edit");
        Route::delete("/delete/{id?}", [ ProductController::class, "delete" ])
        ->name("delete");
    
    });

});