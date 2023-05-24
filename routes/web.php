<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;

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


Route::get('/verified/{user:username}', [AccountController::class, 'verified'])->middleware('admin');

Route::get('/', [PostController::class,'index']);

Route::get('/search', [SearchController::class,'index'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->middleware('admin');

Route::get('/categories/new', [CategoryController::class, 'create'])->middleware('admin');

Route::get('/categories/delete/{category:slug}', [CategoryController::class, 'destroy'])->middleware('admin');

Route::get('/categories/{category:slug}', [CategoryController::class, 'edit'])->middleware('admin');

Route::post('/categories', [CategoryController::class, 'store'])->middleware('admin');

Route::post('/categories/update/{category:slug}', [CategoryController::class, 'update'])->middleware('admin');

Route::get('/create', function () {
    return view('write-recipe', [
        'title' => 'Write Recipe',
        'categories' => Category::all()
    ]);
})->middleware('auth');

Route::get('/account', [AccountController::class, 'index'])->middleware('auth');

Route::post('/account', [PostController::class, 'store']);

Route::get('/edit-akun/{user:username}', [AccountController::class, 'editAkun']);

Route::post('/edit-akun/{user:username}', [AccountController::class, 'updateAkun']);

Route::get('/delete/{post:slug}', [PostController::class, 'destroy']);

Route::get('/edit/{post:slug}', [PostController::class, 'edit']);

Route::post('/edit/{post:slug}', [PostController::class, 'update']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/switch', [LoginController::class, 'switch']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/user/{user:username}', [AccountController::class, 'indexuser'])->middleware('auth');

Route::get('/{post:slug}', [PostController::class, 'show'])->middleware('auth');


Route::post('/register', [RegisterController::class, 'signuP'])->name('register');