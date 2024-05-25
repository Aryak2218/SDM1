<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

//route resource
Route::resource('/posta', \App\Http\Controllers\PostaController::class);

//route resource
Route::resource('/poste', \App\Http\Controllers\PosteController::class);

//route resource
Route::resource('/postz', \App\Http\Controllers\PostzController::class);

//route resource
Route::resource('/postx', \App\Http\Controllers\PostxController::class);

//route resource
Route::resource('/postj', \App\Http\Controllers\PostjController::class);

//route resource
Route::resource('/posto', \App\Http\Controllers\PostoController::class);

//route resource
Route::resource('/postm', \App\Http\Controllers\PostmController::class);

//route resource
Route::resource('/postq', \App\Http\Controllers\PostqController::class);

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::get('posts/view/pdf', [\App\Http\Controllers\PostController::class, 'view_pdf']);





Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', function () {
    return view('dashboard');
});