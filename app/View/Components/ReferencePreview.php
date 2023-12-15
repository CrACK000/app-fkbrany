<?php

namespace App\View\Components;

use App\Models\ReferenceGallery;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Storage;

class ReferencePreview extends Component
{
    public function __construct(
        public int $referenceId,
        public string $referenceTitle,
        public string $resolution
    ) {}

    public function mainImage(): string
    {
        $query = ReferenceGallery::where('reference_id', $this->referenceId)
                                    ->orderBy('main', 'desc')
                                    ->first();

        $resolution = $this->resolution ?? 'original';

        if ($query) {
            $check = Storage::disk('cloud')->exists("galleries/$this->referenceId/{$query->src}_$resolution.$query->tmp");
            if ($check){
                return "https://cloud.fkbrany.sk/galleries/$this->referenceId/{$query->src}_$resolution.$query->tmp";
            } else {
                return "https://cloud.fkbrany.sk/galleries/$this->referenceId/{$query->src}_original.$query->tmp";
            }
        } else {
            return "https://www.survivorsuk.org/wp-content/uploads/2017/01/no-image.jpg";
        }
    }

    public function render(): View
    {
        return view('components.reference-preview', [
            'src' => $this->mainImage(),
            'alt' => $this->referenceTitle
        ]);
    }
}
