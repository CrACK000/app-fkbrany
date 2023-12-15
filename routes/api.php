<?php

use App\Http\Resources\ReferencesResource;
use App\Http\Resources\SettingsResource;
use App\Mail\ContactFormMail;
use App\Mail\OfferFormMail;
use App\Models\Offer;
use App\Models\References;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Mail\SentMessage;
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

Route::get('settings', function () {
    return SettingsResource::collection(Settings::all());
});

Route::get('references', function () {
    return ReferencesResource::collection(References::all()->where('disabled', 0)->reverse());
});
Route::get('references/{id}', function ($id) {
    return ReferencesResource::collection(References::all()->reverse()->where('id', $id));
});

Route::post('post-contact', function (Request $request) {

    Mail::to(Settings::first()->email_receive)->send(
        new ContactFormMail($request)
    );

    return response()->json(['status' => 'Mail bol úspešne odoslaný.']);
});

Route::post('post-offer', function (Request $request) {

    Mail::to(Settings::first()->email_receive)->send(
        new OfferFormMail($request)
    );

    Offer::create(
        $request->all()
    );

    return response()->json(['status' => 'Žiadosť o cenovú ponuku bola odoslaná.']);
});
