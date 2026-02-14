<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\PreRegistroMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PreRegistroController extends Controller
{
    public function create()
    {
        return view('inscripcion'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:150',
            'fecha' => 'required|date',
            'domicilio' => 'required|string|max:200',
            'colonia' => 'required|string|max:150',
            'localidad' => 'required|string|max:150',
            'municipio' => 'required|string|max:150',
            'estado' => 'required|string|max:150',
            'telefono' => 'required|string|max:20',
            'edad' => 'required|integer',
            'estado_civil' => 'required|string|max:50',
            'iglesia' => 'required|string|max:200',
            'domicilio_iglesia' => 'required|string|max:200',
            'colonia_iglesia' => 'required|string|max:150',
            'localidad_iglesia' => 'required|string|max:150',
            'municipio_iglesia' => 'required|string|max:150',
            'tiempo_congregarse' => 'required|string|max:150',
            'pastor' => 'required|string|max:150',
            'cargo' => 'required|in:si,no',
            'proposito' => 'required|string',
            'formacion_teologica' => 'required|string|max:150',
            'escolaridad' => 'required|in:primaria,secundaria,bachillerato,otra',
            
            'motivo_virtual' => 'nullable|string|max:200',
            'region' => 'nullable|string|max:150',
            //'diplomado' => 'nullable|string|max:200',

            'documento_pdf' => 'nullable|file|mimes:pdf|max:5120',
            'correo' => 'required|string|max:150'
        ]);

       
        /*$archivoRuta = null;

        if ($request->hasFile('documento_pdf')) {
            $nombreArchivo = time() . '_' . $request->file('documento_pdf')->getClientOriginalName();

            $path = Storage::disk('gcs')->putFileAs(
                '', 
                $request->file('documento_pdf'),
                $nombreArchivo
            );

            $archivoRuta = $path; 
        }*/


        
        DB::table('preregistro')->insert([
            'nombre_completo' => $request->nombre_completo,
            'fecha_nacimiento' => $request->fecha,
            'domicilio' => $request->domicilio,
            'colonia' => $request->colonia,
            'localidad' => $request->localidad,
            'municipio' => $request->municipio,
            'estado' => $request->estado,
            'telefono' => $request->telefono,
            'edad' => $request->edad,
            'estado_civil' => $request->estado_civil,
            'iglesia' => $request->iglesia,
            'domicilio_iglesia' => $request->domicilio_iglesia,
            'colonia_iglesia' => $request->colonia_iglesia,
            'localidad_iglesia' => $request->localidad_iglesia,
            'municipio_iglesia' => $request->municipio_iglesia,
            'tiempo_congregarse' => $request->tiempo_congregarse,
            'pastor' => $request->pastor,
            'cargo' => $request->cargo,
            'cargo_nombre' => $request->cargo_nombre ?? null,
            'proposito' => $request->proposito,
            'formacion_teologica' => $request->formacion_teologica,
            'primaria' => $request->escolaridad == 'primaria' ? 1 : 0,
            'secundaria' => $request->escolaridad == 'secundaria' ? 1 : 0,
            'bachillerato' => $request->escolaridad == 'bachillerato' ? 1 : 0,
            'otra_escolaridad' => $request->otra_escolaridad ?? null,
            'presencial' => $request->has('presencial') ? 1 : 0,
            'region' => $request->region ?? null,
            'virtual1' => $request->has('virtual') ? 1 : 0,
            'motivo_virtual' => $request->motivo_virtual ?? null,
            'diplomado' => $request->has('diplomado') ? 1 : 0,

            //'archivos' => $archivoRuta,
            'estatus' => 0,
            'correo' => $request->correo
        ]);

        //$urlArchivo = null;
            /*if ($archivoRuta) {
                $urlArchivo = Storage::disk('gcs')->url($archivoRuta);
            }*/

        Mail::to('josue_lopezmanzano@hotmail.com')->send(new PreRegistroMail($request->all(), ''));

        return redirect()->back()->with('success', '¡Solicitud enviada correctamente!');
    }
}
