<?php

namespace App\Http\Controllers;
use App\Models\Atraccion;
use App\Models\Comentario;
use Illuminate\Http\Request;

class AtraccionController extends Controller
{
    public function index()
    {
        $atracciones = Atraccion::with('especie')->get();
        return view('atracciones.index', ['atracciones' => $atracciones]);
    }

    public function obtenerComentarios($minCalificacion, $maxCalificacion)
    {
        $comentarios = Comentario::whereBetween('calificacion', [$minCalificacion, $maxCalificacion])->get();
        return response()->json($comentarios);
    }

    public function cantidadComentarios($id)
    {
        $cantidad = Comentario::where('id_atraccion', $id)->count();
        return response()->json(['cantidad' => $cantidad]);
    }

    public function atraccionesPorEspecie($idEspecie)
    {
        $atracciones = Atraccion::where('id_especie', $idEspecie)->get();
        return response()->json($atracciones);
    }

    public function calificacionPromedioPorEspecie($idEspecie)
    {
        $atracciones = Atraccion::where('id_especie', $idEspecie)->get();
        $calificaciones = $atracciones->map->calificacionPromedio();
        $promedio = $calificaciones->average();
        return response()->json(['calificacion_promedio' => $promedio]);
    }

}
