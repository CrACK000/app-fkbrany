<?php

namespace App\Http\Controllers;

use App\Events\UploadCloudGalleryEvent;
use App\Models\References;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ReferencesController extends Controller
{
    public function post(Request $request): RedirectResponse
    {
        $createReference = References::create($request->all());

        if ($request->file('images')){
            UploadCloudGalleryEvent::upload($request->file('images'), $createReference->id , $request->main);
        }

        session()->flash('message', 'Referencia bola pridaná.');

        return redirect()->route('references');
    }

    public function edit($id)
    {
        return view('references.edit', [
            'referenceId' => $id,
            'title' => References::find($id)->title
        ]);
    }
}
