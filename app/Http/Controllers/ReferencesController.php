<?php

namespace App\Http\Controllers;

use App\Models\ReferenceGallery;
use App\Models\References;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ReferencesController extends Controller
{
    public function post(Request $request): RedirectResponse
    {
        $createReference = References::create($request->all());

        $last_id = $createReference->id;
        $selected_main = $request->main;
        $files = [];

        if ($request->file('images')){
            foreach($request->file('images') as $key => $file)
            {
                $file_src = uniqid();
                $file_tmp = $file->extension();
                $file_full_name = "$file_src.$file_tmp";

                $file->storeAs('galleries/'.$last_id, $file_full_name, 'cloud');
                // @TODO pridať rozlíšenie obrázkov

                $files[$key]['src'] = $file_src;
                $files[$key]['tmp'] = $file_tmp;
                $files[$key]['reference_id'] = $last_id;
                $files[$key]['main'] = $key == $selected_main ? 1 : 0;
            }
        }

        foreach ($files as $file) {
            ReferenceGallery::create($file);
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
