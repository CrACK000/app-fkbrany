<?php

namespace App\View\Components;

use App\Models\ReferenceGallery;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Storage;

class ReferenceImage extends Component
{
    public function __construct(
        public int $imgId,
        public string $imgAlt,
        public string $resolution
    ) {}

    public function mainImage(): string
    {
        $query = ReferenceGallery::where('id', $this->imgId)->first();
        $resolution = $this->resolution ?? 'original';

        $check = Storage::disk('cloud')->exists("galleries/$query->reference_id/{$query->src}_$resolution.$query->tmp");

        if ($check){
            return "https://cloud.fkbrany.sk/galleries/$query->reference_id/{$query->src}_$resolution.$query->tmp";
        } else {
            return "https://cloud.fkbrany.sk/galleries/$query->reference_id/{$query->src}_original.$query->tmp";
        }
    }
    public function render(): View
    {
        return view('components.reference-image', [
            'src' => $this->mainImage(),
            'alt' => $this->imgAlt
        ]);
    }
}
