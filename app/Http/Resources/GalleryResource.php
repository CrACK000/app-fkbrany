<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'src' => $this->src,
            'referenceId' => $this->reference_id,
            'tmp' => $this->tmp,
            'main' => $this->main
        ];
    }
}
