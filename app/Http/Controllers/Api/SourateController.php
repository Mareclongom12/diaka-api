<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sourate;
use Illuminate\Http\Request;

class SourateController extends Controller
{
    public function index()
    {
        return Sourate::orderBy('numero')->get();
    }

    public function show(string $id)
    {
        $sourate = Sourate::with(['audios.reciter'])->findOrFail($id);

        return $sourate;
    }

    public function audios(string $id, Request $request)
    {
        $sourate = Sourate::findOrFail($id);

        $query = $sourate->audios()->with('reciter');

        if ($request->has('reciter_id')) {
            $query->where('reciter_id', $request->query('reciter_id'));
        }

        return $query->get();
    }
}
