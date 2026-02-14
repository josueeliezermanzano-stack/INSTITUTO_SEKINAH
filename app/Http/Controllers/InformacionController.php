<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InformacionController extends Controller
{
    public function index()
    {
        $perfil = session('perfil'); 
        $usuario = session('usuario'); 
        $informacion = collect();
        $informacion = \DB::table('USUARIOS as U')
            ->join('PREREGISTRO as G', 'G.ID_ENCUESTA', '=', 'U.ID_ENCUESTA')
            ->where('U.USUARIO', $usuario)
            ->select('G.*')
            ->first();

        return view('informacion', compact('perfil', 'usuario', 'informacion'));

        
    }
    public function store(Request $request)
    {
        $request->validate([
            'idEncuesta' => 'required',
            'nombre_completo' => 'required|string',
            'correo' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer',
            'estado_civil' => 'required|string',
            'telefono' => 'required|string',
            'domicilio' => 'required|string',
            'colonia' => 'required|string',
            'localidad' => 'required|string',
            'municipio' => 'required|string',
            'estado' => 'required|string',
            'iglesia' => 'required|string',
            'domicilio_iglesia' => 'required|string',
            'colonia_iglesia' => 'required|string',
            'localidad_iglesia' => 'required|string',
            'municipio_iglesia' => 'required|string',
            'tiempo_congregarse' => 'required|string',
            'pastor' => 'required|string',
            'cargo' => 'required|string',
            'cargo_nombre' => 'nullable|string',
        ]);

        DB::table('PREREGISTRO')
            ->where('ID_ENCUESTA', $request->idEncuesta)
            ->update([
                'NOMBRE_COMPLETO' => $request->nombre_completo,
                'CORREO' => $request->correo,
                'FECHA_NACIMIENTO' => $request->fecha_nacimiento,
                'EDAD' => $request->edad,
                'ESTADO_CIVIL' => $request->estado_civil,
                'TELEFONO' => $request->telefono,
                'DOMICILIO' => $request->domicilio,
                'COLONIA' => $request->colonia,
                'LOCALIDAD' => $request->localidad,
                'MUNICIPIO' => $request->municipio,
                'ESTADO' => $request->estado,
                'IGLESIA' => $request->iglesia,
                'DOMICILIO_IGLESIA' => $request->domicilio_iglesia,
                'COLONIA_IGLESIA' => $request->colonia_iglesia,
                'LOCALIDAD_IGLESIA' => $request->localidad_iglesia,
                'MUNICIPIO_IGLESIA' => $request->municipio_iglesia,
                'TIEMPO_CONGREGARSE' => $request->tiempo_congregarse,
                'PASTOR' => $request->pastor,
                'CARGO' => $request->cargo,
                'CARGO_NOMBRE' => $request->cargo_nombre,
            ]);

        return redirect('/informacion')->with('success', 'Información actualizada correctamente.');
    }

}
