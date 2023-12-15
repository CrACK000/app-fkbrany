<?php

namespace App\Livewire;

use App\Events\UploadCloudGalleryEvent;
use App\Models\ReferenceGallery;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormEditGallery extends Component
{
    use WithFileUploads;

    public int $id;
    public int $main;
    public $images = [];

    public function updateGallery(): void
    {
        if ($this->images){
            UploadCloudGalleryEvent::upload($this->images, $this->id);
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
        array_map('unlink', glob(base_path("../cloud/galleries/$imageModel->reference_id/{$imageModel->src}_*.*")));
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
