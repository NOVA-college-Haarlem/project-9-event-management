<?php

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
