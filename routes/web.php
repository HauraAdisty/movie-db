<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [MovieController::class, 'index'])->name('movies.index');
// Route::get('/search', [MovieController::class, 'search'])->name('movies.search');

Route::get('/', [MovieController::class, 'index']); {
    return view('welcome');
}
