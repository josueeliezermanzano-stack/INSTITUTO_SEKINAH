<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Preregistro;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Mail\RegistroMail;
use Illuminate\Support\Facades\Mail;
class AdminPreRegistroController extends Controller
{
    public function index()
    {
        $registros = PreRegistro::where('estatus', 0)
        ->orderBy('fecha_registro', 'desc')
        ->get();
        return view('adminInscripcion', compact('registros'));
    }

    public function aprobar(Request $request)
    {
        $preregistro = Preregistro::where('id_encuesta', $request->id)->first();
        Preregistro::where('id_encuesta', $request->id)
            ->update(['estatus' => 1]);

        $passwordPlano = Str::random(10);

        $usuarioCreado = Usuario::create([
            'CONTRASEÑA'  => Hash::make($passwordPlano),
            'ID_ENCUESTA' => $request->id,
            'PERFIL' =>1
        ]);

        $usuario = $usuarioCreado->USUARIO; 
        $correo  = $preregistro->correo;
        Mail::to($correo)->send(new RegistroMail(1, $passwordPlano,$usuario));
        return response()->json([
            'mensaje' => 'Solicitud aprobada correctamente'
        ]);
    }
    public function rechazar(Request $request)
    {
        $preregistro = Preregistro::where('id_encuesta', $request->id)->first();
        Preregistro::where('id_encuesta', $request->id)
            ->update(['estatus' => 2]);
            $correo  = $preregistro->correo;
        Mail::to($correo)->send(new RegistroMail(2, "",""));
        return response()->json([
            'mensaje' => 'Solicitud rechazada correctamente'
        ]);
    }
}
