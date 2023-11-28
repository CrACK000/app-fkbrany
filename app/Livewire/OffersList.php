<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;

class OffersList extends Component
{
    public $confirmDeleteModal = false;
    public $openDetailsModal = false;
    public $detailsData;
    public $deleteData;

    public function detailsModal($offerId): void
    {
        $this->openDetailsModal = true;
        $this->detailsData = Offer::find($offerId);
    }

    public function confirmDelete($offerId): void
    {
        $this->confirmDeleteModal = true;
        $this->deleteData = Offer::find($offerId);
    }

    public function deleteOffer($offerId): void
    {
        Offer::find($offerId)->delete();
        $this->confirmDeleteModal = false;
        $this->deleteData = [];
    }

    public function render()
    {
        return view('livewire.offers-list', [
            'offers' => Offer::select(['id', 'name', 'surname', 'email', 'gate', 'created_at', 'entryGate', 'montage', 'motor'])->get()
        ]);
    }
}
