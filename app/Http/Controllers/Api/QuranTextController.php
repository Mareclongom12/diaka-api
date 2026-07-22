<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class QuranTextController extends Controller
{
    public function verses(string $numero)
    {
        $response = Http::get("https://api.alquran.cloud/v1/surah/{$numero}/editions/quran-uthmani,fr.hamidullah");

        if (! $response->successful()) {
            return response()->json(['error' => 'Impossible de récupérer les versets.'], 502);
        }

        $data = $response->json('data');

        [$arabe, $francais] = $data;

        $verses = collect($arabe['ayahs'])->map(function ($ayah, $index) use ($francais) {
            return [
                'numero' => $ayah['numberInSurah'],
                'numero_global' => $ayah['number'],
                'arabe' => $ayah['text'],
                'francais' => $francais['ayahs'][$index]['text'] ?? '',
            ];
        });

        return response()->json($verses);
    }

    public function reciters()
    {
        $response = Http::get('https://api.alquran.cloud/v1/edition', [
            'format' => 'audio',
            'language' => 'ar',
            'type' => 'versebyverse',
        ]);

        if (! $response->successful()) {
            return response()->json(['error' => 'Impossible de récupérer les récitateurs.'], 502);
        }

        $editions = collect($response->json('data'))->map(function ($edition) {
            return [
                'identifier' => $edition['identifier'],
                'nom' => $edition['englishName'] ?? $edition['name'] ?? $edition['identifier'],
            ];
        })->values();

        return response()->json($editions);
    }
}
