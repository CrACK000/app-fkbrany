<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Settings */
class SettingsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title_page' => $this->title_page,
            'email_receive' => $this->email_receive,
            'units_measurement' => $this->units_measurement,
            'company_email' => $this->company_email,
            'company_mobile' => $this->company_mobile,
            'company_address' => $this->company_address
        ];
    }
}
