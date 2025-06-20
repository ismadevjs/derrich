<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\ArbitreController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\TapisController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\CombatController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SpectateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('clubs', ClubController::class);
    Route::resource('athletes', AthleteController::class);
    Route::resource('arbitres', ArbitreController::class);
    Route::resource('coachs', CoachController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('salles', SalleController::class);
    Route::resource('tapis', TapisController::class);
    Route::resource('competitions', CompetitionController::class);
    Route::resource('pools', PoolController::class);
    Route::get('pools/{pool}/assign', [PoolController::class, 'assignAthletes'])->name('pools.assign');
    Route::post('pools/{pool}/assign', [PoolController::class, 'storeAthletes'])->name('pools.storeAthletes');
    Route::resource('combats', CombatController::class);
    Route::resource('rankings', RankingController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('spectateurs', SpectateurController::class);
});

Route::get('/live-results', function () {
    $combats = \App\Models\Combat::with(['competition', 'athlete1', 'athlete2', 'vainqueur'])->get();
    return view('live-results', compact('combats'));
})->name('live-results');

require __DIR__.'/auth.php';
