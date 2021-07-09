<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\CentroVacunacion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalificacionController extends Controller
{
    public function index(CentroVacunacion $centro){

        $calificacion = Calificacion::all()->where('center_id', '=', $centro->id);

        return view('calificacion.index', ['calificaciones' => $calificacion]);
    }

    public function create(CentroVacunacion $centro){
        return view('calificacion.create', ['centro' => $centro]);
    }

    public function store(Request $request, CentroVacunacion $centro){

        $request->validate([
            'stars' => 'required',
            'post_by' => 'required',
            'waiting' => 'required',
            'comment' => 'required',
        ]);
        
        $calificacion = new Calificacion();

        $calificacion->center_id = $centro->id;
        $calificacion->calification_date = Carbon::now()->format('Y-m-d H:i:s');
        $calificacion->stars = $request->stars;
        $calificacion->post_by = $request->post_by;
        $calificacion->waiting = $request->waiting;
        $calificacion->comment = $request->comment;

        $calificacion->save();

        return redirect()->route('calificacion.index', $centro)->with('success', 'Calificacion guardada con exito');
    }

    public function destroy(Calificacion $calificacion){
        $calificacion->delete();
        return redirect()->route('moderador')->with('success', 'Calificacion eliminada con exito');
    }
}
