<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;

use App\Http\Controllers\EventShowController;

use Livewire\Volt\Volt;



/*
Route::get('/', function () {
    return view('index');
})->name('home');
*/

Route::get('/', function () {
    return view('index');
})->name('home');


/*
Route::get('/event/{id}', function (string $id) {
    return view('event', [$id]);
})->name('event');
*/
Route::get('/event/{id}', [EventShowController::class, 'show']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('edit-booking', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('edit-booking');	

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Volt::route('verify-email', '/verify-email')->name('settings.appearance');
});

Route::view('/admin/create-event', 'dashboard')
    ->middleware(['auth', 'verified',EnsureUserHasRole::class.':admin'])
    ->name('admin/create-event');
	
Route::view('/admin/bookings', 'dashboard')
    ->middleware(['auth', 'verified',EnsureUserHasRole::class.':admin'])
    ->name('admin/bookings');	

Route::view('/admin/edit-event', 'dashboard')
    ->middleware(['auth', 'verified',EnsureUserHasRole::class.':admin'])
    ->name('admin/edit-event');

require __DIR__.'/auth.php';
