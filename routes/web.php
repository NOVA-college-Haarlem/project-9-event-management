<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Ticket_TypeController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\VenuesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FeedbackController;


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
    Route::get('/calendar', [EventsController::class, 'calendar'])->name('calendar');

});

Route::name("tickets.")->prefix("tickets")->group(function () {
    Route::get('/', [TicketsController::class, 'index'])->name('index');
    Route::get('/create', [TicketsController::class, 'create'])->name('create');
    Route::post('/', [TicketsController::class, 'store'])->name('store');
Route::get('/edit/{ticket}', [TicketsController::class, 'edit'])->name('edit');
    Route::post('/update/{ticket}', [TicketsController::class, 'update'])->name('update');
    Route::delete('/delete/{ticket}', [TicketsController::class, 'delete'])->name('delete');
});
Route::name("ticket_types.")->prefix("ticket_types")->group(function () {
    Route::get('/', [Ticket_TypeController::class, 'index'])->name('index');
    Route::get('/create', [Ticket_TypeController::class, 'create'])->name('create');
    Route::post('/', [Ticket_TypeController::class, 'store'])->name('store');
    Route::get('/edit/{ticket_type}', [Ticket_TypeController::class, 'edit'])->name('edit');
    Route::post('/update/{ticket_type}', [Ticket_TypeController::class, 'update'])->name('update');
    Route::delete('/delete/{ticket_type}', [Ticket_TypeController::class, 'delete'])->name('delete');
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
    Route::get('/{venue}/events', [VenuesController::class, 'events'])->name('events');

});

Route::prefix('registrations')->name('registrations.')->middleware('auth')->group(function () {

    Route::get('/', [RegistrationController::class, 'index'])->name('index');
    Route::get('/create/{event}', [RegistrationController::class, 'create'])->name('create');
    Route::post('/store/{event}', [RegistrationController::class, 'store'])->name('store');
    Route::get('/edit/{registration}', [RegistrationController::class, 'edit'])->name('edit');
    Route::put('/update/{registration}', [RegistrationController::class, 'update'])->name('update');
    Route::delete('/delete/{registration}', [RegistrationController::class, 'delete'])->name('destroy');
    Route::get('/thankyou', function () {return view('registrations.thankyou');})->name('registrations.thankyou');
    

});

Route::prefix('feedback')->name('feedback.')->middleware('auth')->group(function () {
    Route::get('/', [FeedbackController::class, 'create'])->name('create');
    Route::post('/', [FeedbackController::class, 'store'])->name('store');
});



require __DIR__ . '/auth.php';
