<?php

use App\Http\Controllers\ReferencesController;
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
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ReferencesController::class)->group(function () {
        Route::get('/references', function () { return view('references.show'); })->name('references');
        Route::get('/references/add', function () { return view('references.add'); })->name('references.add');
        Route::post('/references/added', 'post')->name('references.post');
        Route::get('/references/edit/{id}', 'edit')->name('references.edit');
    });

    Route::get('/offers', function () { return view('offers.show'); })->name('offers');
    Route::get('/settings', function () { return view('settings.show'); })->name('settings');

});
