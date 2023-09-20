<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'about',
        'contacts',
        'social',
        'privacy',
        'terms',
        'visible_apps',
        'address'
    ];
}
