<?php

namespace App\Livewire;

use App\Models\References;
use Livewire\Component;

class FormEditInfo extends Component
{
    public int $id;
    public string $title;
    public string $description;

    public function updateReferenceInfo(): void
    {
        $reference = References::find($this->id);
        $reference->title = $this->title;
        $reference->description = $this->description;
        $reference->save();
        $this->dispatch('saved');
    }
    public function render()
    {
        $this->title = References::find($this->id)->title;
        $this->description = References::find($this->id)->description;
        return view('livewire.form-edit-info');
    }
}
