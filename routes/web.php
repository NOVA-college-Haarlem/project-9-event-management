<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\VenuesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::name("events.")->prefix("events")->group(function () {

    Route::get('/', [EventsController::class, 'index'])->name('index');
    Route::get('/create', [EventsController::class, 'create'])->name('create');
    Route::post('/', [EventsController::class, 'store'])->name('store');
    Route::get('/edit/{event}', [EventsController::class, 'edit'])->name('edit');
    Route::post('/update/{event}', [EventsController::class, 'update'])->name('update');
    Route::delete('/delete/{event}', [EventsController::class, 'delete'])->name('delete');
});

Route::name("tickets.")->prefix("tickets")->group(function () {
    Route::get('/', [TicketsController::class, 'index'])->name('index');
    Route::get('/create', [TicketsController::class, 'create'])->name('create');
    Route::post('/', [TicketsController::class, 'store'])->name('store');
    Route::get('/edit/{ticket}', [TicketsController::class, 'edit'])->name('edit');
    Route::post('/update/{ticket}', [TicketsController::class, 'update'])->name('update');
    Route::delete('/delete/{ticket}', [TicketsController::class, 'delete'])->name('delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('venues')->name('venues.')->group(function () {
    Route::get('/', [VenuesController::class, 'index'])->name('index');
    Route::get('/create', [VenuesController::class, 'create'])->name('create');
    Route::post('/', [VenuesController::class, 'store'])->name('store');
});

require __DIR__ . '/auth.php';
