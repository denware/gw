<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Controllers\EventShowController;
use App\Http\Controllers\EventEditController;
use Livewire\Volt\Volt;



/*
Route::get('/', function () {
    return view('index');
})->name('home');

*/



Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/event/{id}', [EventShowController::class, 'show']);
Route::get('/admin/edit-event/{id}', [EventEditController::class, 'show']);

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

Route::view('/admin/create-event', 'createboard')
    ->middleware(['auth', 'verified',EnsureUserHasRole::class.':admin'])
    ->name('admin/create-event');
/*
Route::view('/admin/edit-event/{id}', 'editboard')
    ->middleware(['auth', 'verified',EnsureUserHasRole::class.':admin'])
    ->name('admin/edit/event');
*/
Route::view('/admin/bookings', 'dashboard')
    ->middleware(['auth', 'verified',EnsureUserHasRole::class.':admin'])
    ->name('admin/bookings');

require __DIR__.'/auth.php';
