<?php

namespace App\Http\Resources;

use App\Models\Gallery;
use App\Models\References;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin References */
class ReferencesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->created_at,
            'gallery' => GalleryResource::collection(Gallery::all()
                ->where('reference_id', $this->id)
            )
        ];
    }
}
