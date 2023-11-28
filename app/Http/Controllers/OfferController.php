<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        return Offer::all();
    }

    public function store(OfferRequest $request)
    {
        return Offer::create($request->validated());
    }

    public function show(Offer $offer)
    {
        return $offer;
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $offer->update($request->validated());

        return $offer;
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return response()->json();
    }
}
