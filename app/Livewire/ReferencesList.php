<?php

namespace App\Livewire;

use App\Models\ReferenceGallery;
use App\Models\References;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ReferencesList extends Component
{
    use WithPagination;

    public $confirmingReferenceDelete = false;
    public int $referenceId;
    public string $referenceTitle;

    public function confirmReferenceDelete(int $referenceId, string $referenceTitle): void
    {
        $this->referenceId = $referenceId;
        $this->referenceTitle = $referenceTitle;
        $this->confirmingReferenceDelete = true;
    }
    public function delete(): void
    {
        $this->confirmingReferenceDelete = false;

        $reference  = References::find($this->referenceId);
        $gallery    = ReferenceGallery::where('reference_id', $this->referenceId);

        Storage::disk('cloud')->deleteDirectory("galleries/$this->referenceId");
        $gallery->delete();
        $reference->delete();
    }
    public function render()
    {
        return view('livewire.references-list', [
            'references' => References::orderBy('id', 'desc')->paginate(5)
        ]);
    }
}
