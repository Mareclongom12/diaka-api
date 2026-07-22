<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reciter;

class ReciterController extends Controller
{
    public function index()
    {
        return Reciter::all();
    }
}
