<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GameEventController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\SquadController;
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
Route::middleware('closest_game')->group(function(){
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

    Route::get('/squad', [SquadController::class, 'index'])->name('squad.index');
    Route::get('/games', [\App\Http\Controllers\GameController::class, 'index'])->name('games.index');
    Route::get('/games/{game}', [\App\Http\Controllers\GameController::class, 'show'])->name('games.show');

});

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::resource('players', PlayerController::class)
        ->only(['index', 'create', 'store']);
    Route::resource('games', GameController::class)
        ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::resource('tournaments', TournamentController::class)
        ->only(['index', 'create', 'store']);
    Route::resource('teams', TeamController::class)
        ->only(['index', 'create', 'store']);
    Route::resource('sponsors', SponsorController::class)
        ->only(['index', 'create', 'store']);

    Route::delete('/games/{game}/events/{gameEvent}', [GameEventController::class, 'destroy'])->name('games.events.destroy');
    Route::post('/games/{game}/events', [GameEventController::class, 'store'])->name('games.events.create');
});
require __DIR__.'/auth.php';
