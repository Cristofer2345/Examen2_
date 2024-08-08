<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $comentario = Comentario::create($request->all());
        return response()->json($comentario, 201);
    }
}
