<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [
        'name',
        'surname',
        'email',
        'mobile',
        'gate',
        'styleGate',
        'widthGate',
        'heightGate',
        'entryGate',
        'widthEntryGate',
        'heightEntryGate',
        'montage',
        'montagePlace',
        'motor',
        'msg',
    ];
}
