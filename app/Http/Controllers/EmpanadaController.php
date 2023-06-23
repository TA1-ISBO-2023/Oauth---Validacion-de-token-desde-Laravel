<?php

namespace App\Http\Controllers;
use App\Models\Empanada;

use Illuminate\Http\Request;

class EmpanadaController extends Controller
{
    //

    public function List(Request $request){
        return Empanada::all();
    }

    public function Create(Request $request){
        $empanada = new Empanada();
        $empanada -> nombre = $request -> post("nombre");
        $empanada -> precio = $request -> post("precio");
        $empanada -> save();

        return $empanada;
    }
}
