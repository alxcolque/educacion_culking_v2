<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'deporte',
            'programacion',
            'oficina',
            'futbol',
            'viral',
            'facebook',
            'contruccion',
            'cocina',
            'venta',
            'viaje',
            'accidente',
            'robo',
            'escuela',
            'educacion',
            'video',
            'eliminatorias',
            'eurocopa',
            'tiktok',
            'bancarota',
            'empresa',
            'emprededor',
            'ladron',
            'oruro',
            'cochabamaba',
            'lapaz',
            'politica',
            'mas',
            'izquierda',
            'derecha'
         ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
