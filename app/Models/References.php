<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    protected $table = 'references';
    protected $fillable = ['id', 'title', 'description'];
}
