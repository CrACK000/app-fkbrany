<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'surname' => ['nullable'],
            'email' => ['required', 'email', 'max:254'],
            'mobile' => ['nullable'],
            'gate' => ['required'],
            'styleGate' => ['required'],
            'widthGate' => ['required'],
            'heightGate' => ['required'],
            'entryGate' => ['required', 'integer'],
            'widthEntryGate' => ['nullable'],
            'heightEntryGate' => ['nullable'],
            'montage' => ['required', 'integer'],
            'montagePlace' => ['nullable'],
            'motor' => ['required', 'integer'],
            'msg' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
