<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $primaryKey = null;

    protected $fillable = [
        'title_page',
        'email_receive',
        'units_measurement',
        'company_email',
        'company_mobile',
        'company_address',
    ];
}
