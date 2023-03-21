<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PostController::class, 'index'])->name('index');
Route::post('/', [PostController::class, 'delete']);
Route::get('/home', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:id}', [PostController::class, 'find']);
Route::get('/user/{user:name}', [PostController::class, 'finduser'])->name('user');
Route::get('admin', function (){
//    return view('admin');
    return "You have access";
})->middleware('auth')->middleware('admin')->name('admin');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/user/create', [\App\Http\Controllers\PostController::class, 'create'])->middleware('auth');
Route::get('/create', function (){
    return view('create');
})->middleware('auth')->name('create');
require __DIR__.'/auth.php';
Route::post('user/post', [PostController::class, 'store'])->middleware('auth');
