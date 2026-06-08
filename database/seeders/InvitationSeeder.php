<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invitation;
use App\Models\Template;
use Illuminate\Support\Str;

class InvitationSeeder extends Seeder
{
    public function run(): void
    {
        $templates = Template::all();

        if ($templates->count() == 0) {
            return;
        }

        foreach (range(1, 10) as $i) {
            Invitation::create([
                'template_id' => $templates->random()->id,
                'nama' => 'User ' . $i,
                'tanggal' => now()->addDays(rand(1, 30)),
                'lokasi' => 'Denpasar, Bali',
                'deskripsi' => 'Undangan pernikahan sederhana ke-' . $i,
                'slug' => Str::slug('user-' . $i . '-' . rand(100,999)),
                'status' => rand(0,1) ? 'paid' : 'pending',
            ]);
        }
    }
}
