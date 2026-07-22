<?php

namespace Database\Seeders;

use App\Models\Reciter;
use Illuminate\Database\Seeder;

class ReciterSeeder extends Seeder
{
    public function run(): void
    {
        $reciters = [
            ['nom' => 'Mishary Alafasy', 'style' => 'Murattal', 'server_url' => 'https://server8.mp3quran.net/afs/'],
            ['nom' => 'Abdul Rahman Al-Sudais', 'style' => 'Murattal', 'server_url' => 'https://server11.mp3quran.net/sds/'],
            ['nom' => 'Saud Al-Shuraim', 'style' => 'Murattal', 'server_url' => 'https://server7.mp3quran.net/shur/'],
            ['nom' => 'Saad Al-Ghamdi', 'style' => 'Murattal', 'server_url' => 'https://server7.mp3quran.net/s_gmd/'],
        ];

        foreach ($reciters as $reciter) {
            Reciter::updateOrCreate(['nom' => $reciter['nom']], $reciter);
        }
    }
}
