<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\Back;

class homeController extends Controller
{
    public function index(){

    }
    public function recibirDatos(Request $request){
        $letras = $request->letras;
        $numLetras = strlen($letras);
        $numero = $request->numero; #nº de letras a combinar;
        $back = new Back($numero, $letras);
        //0. Inicializamos el backtracking, esto es default
		$back->init();
        // 0. Ejecutamos backtracking, tambien es default
        $lista = $back->backtracking();
        return view('palabras')->with('palabrasMostrar', $lista);
    }
}

