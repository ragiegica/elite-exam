<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::group(['as' => "dashboard.", 'prefix' => "dashboard"], function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('total-overview/artist/{id}', [DashboardController::class, 'totalOverviewPerArtist'])->name('total_overview_per_artist');
        Route::get('top-one-artist', [DashboardController::class, 'topOneArtist'])->name('top_one_artist');
    });

    Route::group(['as' => "artist.", 'prefix' => "artist"], function () {
        Route::get('/', [ArtistController::class, 'index'])->name('index');
        Route::get('list', [ArtistController::class, 'indexData'])->name('list');
        Route::get('details/{id}', [ArtistController::class, 'singleArtist'])->name('details');
        Route::post('add', [ArtistController::class, 'add'])->name('add');
        Route::post('edit', [ArtistController::class, 'edit'])->name('edit');
        Route::delete('delete/{id}', [ArtistController::class, 'delete'])->name('delete');
        Route::get('list-all/', [ArtistController::class, 'getAll'])->name('get_all');
    });

    Route::group(['as' => "album.", 'prefix' => "album"], function () {
        Route::get('/', [AlbumController::class, 'index'])->name('index');
        Route::get('list', [AlbumController::class, 'indexData'])->name('list');
        Route::get('details/{id}', [AlbumController::class, 'singleAlbum'])->name('details');
        Route::post('add', [AlbumController::class, 'add'])->name('add');
        Route::post('edit', [AlbumController::class, 'edit'])->name('edit');
        Route::delete('delete/{id}', [AlbumController::class, 'delete'])->name('delete');
    });

    Route::group(['as' => "other.", 'prefix' => "other"], function () {
        Route::get('/shortest-word', [OtherController::class, 'shortestWord'])->name('shortest_word');
        Route::get('/count-the-islands', [OtherController::class, 'countTheIslands'])->name('island');
        Route::get('/word-search', [OtherController::class, 'wordSearch'])->name('search');
    });
});
