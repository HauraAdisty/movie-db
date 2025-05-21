<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [MovieController::class, 'index'])->name('movies.index');
// Route::get('/search', [MovieController::class, 'search'])->name('movies.search');

Route::get('/', [MovieController::class, 'index']);

 Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie']);



 Route::get('/movie/create',[MovieController::class,'create']);
 Route::post('/movie/store', [MovieController::class,'store']);
