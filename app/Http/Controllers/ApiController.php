<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;

class ApiController extends Controller
{
    public function updateAtraccion(Request $request, $id)
    {
        $atraccion = Atraccion::find($id);
        if (!$atraccion) {
            return response()->json(['error' => 'Atracción no encontrada'], 404);
        }
        $atraccion->update($request->all());
        return response()->json($atraccion);
    }
}
