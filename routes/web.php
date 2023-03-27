<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::get('home', [PostController::class, 'index'])->name('home');
Route::get('post/{post:id}', [PostController::class, 'find']);
Route::get('user/{user:name}', [PostController::class, 'finduser']);
Route::get('user', [PostController::class, 'user'])->name('user');
Route::get('admin', [admincontroller::class, 'dashboard'])->middleware('auth')->middleware('admin')->name('admin');
Route::get('admin/queue', [admincontroller::class, 'index'])->middleware('auth')->middleware('admin')->name('queue');
Route::post('admin/queue', [admincontroller::class, 'approve'])->middleware('auth')->middleware('admin');
Route::get('admin/users', [UserController::class, 'index'])->middleware('auth')->middleware('admin')->name('usermanagement');
Route::post('admin/users', [UserController::class, 'update'])->middleware('auth')->middleware('admin');
Route::get('admin/categories', [CategoryController::class, 'index'])->middleware('auth')->middleware('admin')->name('catmanagement');
Route::post('admin/categories', [CategoryController::class, 'Delete'])->middleware('auth')->middleware('admin')->name('category.delete');
Route::put('admin/categories', [CategoryController::class, 'create'])->middleware('auth')->middleware('admin')->name('category.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/user/create', [\App\Http\Controllers\PostController::class, 'create'])->middleware('auth');
Route::get('/create', function () {
    return view('create');
})->middleware('auth')->name('create');
require __DIR__ . '/auth.php';
Route::post('user/post', [PostController::class, 'store'])->middleware('auth');
