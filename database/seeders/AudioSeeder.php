<?php

namespace Database\Seeders;

use App\Models\Audio;
use App\Models\Reciter;
use App\Models\Sourate;
use Illuminate\Database\Seeder;

class AudioSeeder extends Seeder
{
    public function run(): void
    {
        $reciters = Reciter::whereNotNull('server_url')->get();
        $sourates = Sourate::all();

        foreach ($reciters as $reciter) {
            foreach ($sourates as $sourate) {
                $numeroFormate = str_pad($sourate->numero, 3, '0', STR_PAD_LEFT);

                Audio::updateOrCreate(
                    [
                        'sourate_id' => $sourate->id,
                        'reciter_id' => $reciter->id,
                    ],
                    [
                        'url' => $reciter->server_url . $numeroFormate . '.mp3',
                    ]
                );
            }
        }
    }
}
