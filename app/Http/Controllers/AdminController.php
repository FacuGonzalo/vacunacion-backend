<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {

        $covid = Http::get('http://gobiernoabierto.bahia.gob.ar/WS/3032');
        $vacunas = Http::get('https://covidstats.com.ar/ws/vacunadosmonitor');

        $vacunasArray = $vacunas->json();
        $covidArray = $covid->json();

        $primero = reset($vacunasArray);
        $ultimo = end($primero);
        $totales = $ultimo['totales'];

        return view('dashboard', compact('covidArray', 'totales'));
    }
}
