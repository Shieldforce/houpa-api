<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDocumentation\MainController as ApiDocumentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect()->route("apiDocumentation.main.index");
});

Route::get("/apiDocumentation", [ ApiDocumentController::class, "index" ])
->name("apiDocumentation.main.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');
