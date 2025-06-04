<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;

// Route::get('/', function () {
//     return view('welcome');
// });


 Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/search', [MovieController::class, 'search'])->name('movies.search');

// Route::get('/', [MovieController::class, 'index']);


Route::resource('movie', MovieController::class);

 Route::get('/movie/create',[MovieController::class,'create'])->middleware('auth');
 Route::post('/movie/store', [MovieController::class,'store'])->middleware('auth');

 Route::get('login', [AuthController::class, 'Formlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie'])->name('movie.detail');
Route::get('/movies', [MovieController::class, 'list'])->name('movie.list');

Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->middleware('auth', RoleAdmin::class)->name('movie.edit');
Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movie.destroy');

