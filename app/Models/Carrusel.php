<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrusel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'visible',
        'description',
        'title_button',
        'color_button',
        'url_button',
        'position',
        'url_image',
        'status',
        'type'
    ];
}
