<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Static routes
Route::view('/', 'index')->name('index');
Route::view('/moveMovie', 'move-movie')->name('move-movie');

// CSRF token route
Route::get('/token', function () {
    return csrf_token();
});

// 1-10
Route::get('/moviesByProducer', [MovieController::class, 'moviesByProducer']);

Route::get('/moviesByDirector', [MovieController::class, 'moviesByDirector']);

Route::get('/mostExpensiveMovieByProducer', [MovieController::class, 'mostExpensiveMovieByProducer']);

Route::get('/moviesByYear', [MovieController::class, 'moviesByYear']);

Route::get('/actressNotJoiningProducer', [MovieController::class, 'actressNotJoiningProducer']);

Route::get('/actressByHighestEarningInAMovie', [MovieController::class, 'actressByHighestEarningInAMovie']);

Route::get('/actorsAndActressesInMovie', [MovieController::class, 'actorsAndActressesInMovie']);

Route::get('/moviesByDirectorAndBudget', [MovieController::class, 'moviesByDirectorAndBudget']);

Route::get('/producersWithMostExpensiveMoviesByYear', [MovieController::class, 'producersWithMostExpensiveMoviesByYear']);

Route::get('/moviesWatchedForActorOrActress', [MovieController::class, 'moviesWatchedForActorOrActress']);


// 1-4
Route::get('/addActor', [MovieController::class, 'addActor'])->name('add-actor');
Route::post('/insertNewActor', [MovieController::class, 'insertNewActor']);

Route::get('/addMovie', [MovieController::class, 'addMovie'])->name('add-movie');
Route::post('/insertNewMovie', [MovieController::class, 'insertNewMovie']);

Route::get('/moveMovie', [MovieController::class, 'moveMovie'])->name('move-movie');
Route::post('/updateMoveScreeningStatus', [MovieController::class, 'updateMoveScreeningStatus']);

Route::get('/screenInTwoTheaters', [MovieController::class, 'screenInTwoTheaters'])->name('start-movie');
Route::post('/insertScreeningInTwoTheaters', [MovieController::class, 'insertScreeningInTwoTheaters']);