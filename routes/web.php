<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

Route::get('/', function () {
    return view('welcome');
});


Route::name("events.")->prefix("events")->group(function () {

    Route::get('/', [EventsController::class, 'index'])->name('index');
    Route::get('/create', [EventsController::class, 'create'])->name('create');
    Route::post('/', [EventsController::class, 'store'])->name('store');
    Route::get('/edit/{event}', [EventsController::class, 'edit'])->name('edit');
    Route::post('/update/{event}', [EventsController::class, 'update'])->name('update');
    Route::delete('/delete/{event}', [EventsController::class, 'delete'])->name('delete');
});

Route::name("tickets.")->prefix("tickets")->group(function () {
    Route::get('/', [TicketsController::class, 'index']);
    Route::get('/create', [TicketsController::class, 'create']);
    Route::post('/', [TicketsController::class, 'store']);
    Route::get('/edit/{ticket}', [TicketsController::class, 'edit']);
    Route::post('/update/{ticket}', [TicketsController::class, 'update']);
    Route::delete('/delete/{ticket}', [TicketsController::class, 'delete']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
