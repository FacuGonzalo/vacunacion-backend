<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\CentroVacunacion;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index()
    {

        $centros = CentroVacunacion::all();

        return view('centros.index', compact('centros'));
    }

    public function create()
    {
        return view('centros.create');
    }

    public function show(CentroVacunacion $centro)
    {
        $imagen = stream_get_contents($centro->imagen);
        return view('centros.show', array(
            'centro'=> $centro,
            'imagen' => $imagen
        ));
    }

    public function edit(CentroVacunacion $centro)
    {

        return view('centros.edit', ['centro' => $centro]);
    }

    public function update(Request $request, CentroVacunacion $centro)
    {

        $request->validate([
            'center_name' => 'required',
            'center_adress' => 'required',
            'center_phone' => 'required',
            'center_area' => 'required',
            'center_timetable' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'imagen' => 'required|image|max:2048'

        ]);

        $centro->center_name = $request->center_name;
        $centro->center_adress = $request->center_adress;
        $centro->center_phone = $request->center_phone;
        $centro->center_area = $request->center_area;
        $centro->center_timetable = $request->center_timetable;
        $centro->latitud = $request->latitud;
        $centro->longitud = $request->longitud;

        if($request->hasFile('imagen')){
            $contenido = file_get_contents($request->file('imagen'));
            $centro->imagen = base64_encode($contenido);
        }

        $centro->save();
        
        return redirect()->route('centro.show', $centro)->with('success', 'Centro actualizado con exito');
    }

    public function store(Request $request)
    {
        $request->validate([
            'center_name' => 'required',
            'center_adress' => 'required',
            'center_phone' => 'required',
            'center_area' => 'required',
            'center_timetable' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'imagen' => 'required|image|max:2048'

        ]);

        $centro = new CentroVacunacion();

        $centro->center_name = $request->center_name;
        $centro->center_adress = $request->center_adress;
        $centro->center_phone = $request->center_phone;
        $centro->center_area = $request->center_area;
        $centro->center_timetable = $request->center_timetable;
        $centro->latitud = $request->latitud;
        $centro->longitud = $request->longitud;
        $centro->imagen = $request->imagen;

        $contenido = file_get_contents($request->file('imagen'));
        $centro->imagen = base64_encode($contenido);

        $centro->save();

        return redirect()->route('centro.index')->with('success', 'Centro creado con exito');
    }

    public function destroy(CentroVacunacion $centro)
    {

        $calificaciones = Calificacion::all()->where('center_id', '=', $centro->id);

        foreach ($calificaciones as $calificacion)
            $calificacion->delete();

        $centro->delete();
        return redirect()->route('centro.index')->with('success', 'Centro eliminado con exito');
    }
}
