<?php

namespace App\View\Components;

use App\Models\ReferenceGallery;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReferenceImage extends Component
{
    public function __construct(
        public int $imgId,
        public string $imgAlt
    ) {}

    public function mainImage(): string
    {
        $query = ReferenceGallery::where('id', $this->imgId)->first();
        return "https://cloud.fkbrany.sk/galleries/$query->reference_id/$query->src.$query->tmp";
    }
    public function render(): View
    {
        return view('components.reference-image', [
            'src' => $this->mainImage(),
            'alt' => $this->imgAlt
        ]);
    }
}
