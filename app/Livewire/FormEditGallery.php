<?php

namespace App\Livewire;

use App\Models\ReferenceGallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormEditGallery extends Component
{
    use WithFileUploads;

    public int $id;
    public int $main;
    public $images;

    public function updateGallery(): void
    {
        if ($this->images){

            $files = [];

            foreach ($this->images as $key => $image) {

                $file_src = uniqid();
                $file_tmp = $image->extension();
                $file_full_name = "$file_src.$file_tmp";

                $image->storeAs('galleries/'.$this->id, $file_full_name, 'cloud');

                $files[$key]['src'] = $file_src;
                $files[$key]['tmp'] = $file_tmp;
                $files[$key]['reference_id'] = $this->id;
            }

            foreach ($files as $file) {
                ReferenceGallery::create($file);
            }

            $this->images = [];
            $this->dispatch('saved');
        }
    }

    public function setMainImg($imgId): void
    {
        $this->main = $imgId;

        $reference = ReferenceGallery::find($imgId);

        ReferenceGallery::where('reference_id', $reference->reference_id)
            ->update([
                'main' => 0
            ]);

        $reference->main = 1;
        $reference->save();

    }

    public function deleteImg($imgId): void
    {
        $imageModel = ReferenceGallery::find($imgId);
        Storage::disk('cloud')->delete("galleries/$imageModel->reference_id/$imageModel->src.$imageModel->tmp");
        $imageModel->delete();
    }

    public function render()
    {
        $this->main = ReferenceGallery::where('reference_id', $this->id)
            ->orderBy('main', 'desc')
            ->first()
            ->id;

        return view('livewire.form-edit-gallery', [
            'gallery' => ReferenceGallery::where('reference_id', $this->id)->get()
        ]);
    }
}
