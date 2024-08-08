<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        return response()->json($especies);
    }

    public function show($id)
    {
        $especie = Especie::find($id);
        if (!$especie) {
            return response()->json(['error' => 'Especie no encontrada'], 404);
        }
        return response()->json($especie);
    }
}
