<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        Template::create([
            'name' => 'Elegant Gold',
            'slug' => 'elegant-gold',
            'thumbnail' => 'images/templates/elegant-gold.jpg',
            'price' => 149000,
            'description' => 'Template wedding elegan dengan nuansa emas.',
            'is_active' => true,
        ]);

        Template::create([
            'name' => 'Minimal White',
            'slug' => 'minimal-white',
            'thumbnail' => 'images/templates/minimal-white.jpg',
            'price' => 129000,
            'description' => 'Template wedding minimalis modern.',
            'is_active' => true,
        ]);

        Template::create([
            'name' => 'Romantic Floral',
            'slug' => 'romantic-floral',
            'thumbnail' => 'images/templates/romantic-floral.jpg',
            'price' => 159000,
            'description' => 'Template wedding floral romantis.',
            'is_active' => true,
        ]);
    }
}