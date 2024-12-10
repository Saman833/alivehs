<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PermissionsRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clubs', ClubController::class);
    Route::resource('events', EventController::class);
    Route::put('events/{event}/join', [EventController::class, 'join'])->name('events.join');
    Route::get('/myevents', [EventController::class, 'myEvents'])->name('what');
    Route::get('/myclubs', [ClubController::class, 'myClubs'])->name('clubs.mine');
    Route::put('clubs/{club}/join', [ClubController::class, 'join'])->name('clubs.join');
    Route::post('/profile/permissionsRequest', [PermissionsRequestController::class, 'permissionsRequest'])->name('permissions.request');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/clubs/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::put('/clubs/{club}', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/clubs/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');
});


require __DIR__.'/auth.php';


