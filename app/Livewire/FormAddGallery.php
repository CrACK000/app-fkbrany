<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormAddGallery extends Component
{
    use WithFileUploads;
    public array $images = [];
    public int $main = 0;

    public function setMainImg($main): void
    {
        $this->main = $main;
    }
    public function render()
    {
        return view('livewire.form-add-gallery');
    }
}
