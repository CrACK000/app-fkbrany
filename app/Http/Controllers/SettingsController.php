<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return SettingsResource::collection(Settings::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_page' => ['required'],
            'email_receive' => ['required'],
            'units_measurement' => ['required'],
            'company_email' => ['required', 'email', 'max:254'],
            'company_mobile' => ['required'],
            'company_address' => ['required'],
        ]);

        return new SettingsResource(Settings::create($request->validated()));
    }

    public function show(Settings $settings)
    {
        return new SettingsResource($settings);
    }

    public function update(Request $request, Settings $settings)
    {
        $request->validate([
            'title_page' => ['required'],
            'email_receive' => ['required'],
            'units_measurement' => ['required'],
            'company_email' => ['required', 'email', 'max:254'],
            'company_mobile' => ['required'],
            'company_address' => ['required'],
        ]);

        $settings->update($request->validated());

        return new SettingsResource($settings);
    }

    public function destroy(Settings $settings)
    {
        $settings->delete();

        return response()->json();
    }
}
