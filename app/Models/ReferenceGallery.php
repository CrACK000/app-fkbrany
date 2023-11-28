<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'tmp',
        'reference_id',
        'main',
    ];
}
