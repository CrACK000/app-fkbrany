<?php

use App\Http\Resources\ReferencesResource;
use App\Mail\ContactFormMail;
use App\Mail\OfferFormMail;
use App\Models\Offer;
use App\Models\References;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('references', function () {
    return ReferencesResource::collection(References::all()->reverse());
});
Route::get('references/{id}', function ($id) {
    return ReferencesResource::collection(References::all()->reverse()->where('id', $id));
});

Route::post('post-contact', function ($request) {
    return Mail::to('patrikfejfar2@gmail.com')->send(new ContactFormMail($request));
    // @todo treba otestovať
});

Route::post('post-offer', function ($request) {
    Mail::to('patrikfejfar2@gmail.com')->send(new OfferFormMail($request));
    Offer::create($request);
    // @todo treba otestovať
});
