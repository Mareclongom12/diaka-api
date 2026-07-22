<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favori;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->favoris()->with('sourate')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sourate_id' => 'required|exists:sourates,id',
        ]);

        $favori = Favori::firstOrCreate([
            'user_id' => $request->user()->id,
            'sourate_id' => $validated['sourate_id'],
        ]);

        return response()->json($favori->load('sourate'), 201);
    }

    public function destroy(string $id, Request $request)
    {
        $favori = Favori::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $favori->delete();

        return response()->json(null, 204);
    }
}
