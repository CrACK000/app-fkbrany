<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ReferenceGallery */
class GalleryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'src' => $this->src,
            'tmp' => $this->tmp,
            'referenceId' => $this->reference_id,
            'main' => $this->main,
            //'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at,
        ];
    }
}
