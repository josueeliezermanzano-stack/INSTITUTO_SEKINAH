<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Preregistro;
use Illuminate\Support\Str;
class MateriasController extends Controller
{
    public function index()
    {
        $perfil = session('perfil'); 
        $usuario = session('usuario'); 
        $materias = collect();
        $profesores=collect();
        $regiones=collect();
        $periodo=collect();
        $asignaciones=collect();
        if ($perfil == 1) {
           $materias = DB::table('MATERIAS_ASIGNADAS as A')
            ->join('MATERIAS as M', 'A.MATERIA', '=', 'M.ID_MATERIA')

            ->join('USUARIOS as U_ALU', 'U_ALU.USUARIO', '=', 'A.ALUMNO')
            ->join('PREREGISTRO as P_ALU', 'P_ALU.ID_ENCUESTA', '=', 'U_ALU.ID_ENCUESTA')

            ->join('USUARIOS as U_PROF', 'U_PROF.USUARIO', '=', 'A.PROFESOR')
            ->join('PREREGISTRO as P_PROF', 'P_PROF.ID_ENCUESTA', '=', 'U_PROF.ID_ENCUESTA')

            ->join('REGION as R', 'R.ID_REGION', '=', 'A.REGION')
            ->join('PERIODO as PE', 'PE.ID_PERIODO', '=', 'A.PERIODO')

            ->where('A.ALUMNO', $usuario)
            ->where('PE.ESTATUS', 1)

            ->select([
                'P_ALU.NOMBRE_COMPLETO as alumno',
                'M.NOMBRE_MATERIA as materia',
                'PE.PERIODO',
                'A.CALIFICACION',
                'R.NOMBRE as region',
                'P_PROF.NOMBRE_COMPLETO as profesor'
            ])
            ->get();
            return view('materias', compact('materias'));
        }else if($perfil==2){
            $materias = DB::table('MATERIAS_ASIGNADAS as M')
            ->join('MATERIAS as MA', 'MA.ID_MATERIA', '=', 'M.MATERIA')
            ->join('REGION as R', 'R.ID_REGION', '=', 'M.REGION')
            ->where('M.PROFESOR', $usuario)
            ->where('M.PERIODO', function ($query) {
                $query->select('ID_PERIODO')
                    ->from('PERIODO')
                    ->where('ESTATUS', 1);
            })
            ->whereNull('M.ALUMNO')
            ->distinct()
            ->select('MA.NOMBRE_MATERIA','M.ID' ,'M.MATERIA','R.NOMBRE as REGION','R.ID_REGION','M.PROFESOR','M.PERIODO')
            ->get();

            return view('materias', compact('materias'));
        }else if($perfil==3){
            $materias = DB::table('MATERIAS')
                ->select('ID_MATERIA', 'NOMBRE_MATERIA', 'CUATRIMESTRE')
                ->orderBy('CUATRIMESTRE', 'ASC')
                ->get();

            $periodo = DB::table('PERIODO')
                ->select('ID_PERIODO', 'PERIODO')
                ->where('ESTATUS', 1)
                ->get();

            $profesores = DB::table('USUARIOS as U')
                ->join('PREREGISTRO as R', 'R.ID_ENCUESTA', '=', 'U.ID_ENCUESTA')
                ->where('U.PERFIL', 2)
                ->select('U.USUARIO', 'R.NOMBRE_COMPLETO')
                ->get();

            $regiones = DB::table('REGION')
                ->select('ID_REGION', 'NOMBRE')
                ->get();

            $asignaciones = DB::table('MATERIAS_ASIGNADAS as A')
                ->join('USUARIOS as U', 'A.PROFESOR', '=', 'U.USUARIO')
                ->join('PREREGISTRO as P', 'P.ID_ENCUESTA', '=', 'U.ID_ENCUESTA')
                ->join('MATERIAS as M', 'M.ID_MATERIA', '=', 'A.MATERIA')
                ->join('PERIODO as PE', 'PE.ID_PERIODO', '=', 'A.PERIODO')
                ->join('REGION as R', 'R.ID_REGION', '=', 'A.REGION')
                ->whereNull('A.ALUMNO')
                ->where('PE.ESTATUS', 1)
                ->orderBy('A.MATERIA', 'ASC')
                ->select([
                    'A.ID',
                    'P.NOMBRE_COMPLETO as profesor',
                    'M.NOMBRE_MATERIA as materia',
                    'PE.PERIODO',
                    'R.NOMBRE as region'
                ])
                ->get();

            return view('materias', compact(
                'materias',
                'profesores',
                'regiones',
                'periodo',
                'asignaciones'
            ));
        }else{
            return view('materias', compact('materias'));
        }

        
    }
    public function asignar(Request $request)
    {
        $request->validate([
            'materia'  => 'required|integer',
            'periodo'  => 'required|integer',
            'profesor' => 'required|integer',
            'region'   => 'required|integer',
        ]);

        DB::table('MATERIAS_ASIGNADAS')->insert([
            'MATERIA'  => $request->materia,
            'PROFESOR' => $request->profesor,
            'PERIODO'  => $request->periodo,
            'REGION'   => $request->region,
        ]);

        return response()->json([
            'ok' => true
        ]);
    }
    public function eliminar(Request $request)
    {
        DB::table('MATERIAS_ASIGNADAS')
            ->where('ID', $request->id)
            ->delete();

        return redirect()->back()->with('success', 'Asignación eliminada correctamente');
    }
    public function asignarAlumnos()
    {
        try {
            DB::statement('CALL insertar_materias_alumnos()');

            return response()->json([
                'ok' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'ok' => false,
                'mensaje' => $e->getMessage()
            ], 500);
        }
    }
    public function ver(Request $request)
    {
        $request->validate([
            'materia'  => 'required|integer',
            'profesor' => 'required|integer',
            'periodo'  => 'required|integer',
            'region'   => 'required|integer'
        ]);

        $resultados = DB::table('MATERIAS_ASIGNADAS as M')
            ->join('MATERIAS as MA', 'MA.ID_MATERIA', '=', 'M.MATERIA')
            ->join('USUARIOS as U', 'U.USUARIO', '=', 'M.ALUMNO')
            ->join('PREREGISTRO as P', 'P.ID_ENCUESTA', '=', 'U.ID_ENCUESTA')
            ->where('M.PROFESOR', $request->profesor)
            ->where('M.PERIODO', $request->periodo)
            ->where('M.MATERIA', $request->materia)
            ->where('M.REGION', $request->region)
            ->whereNotNull('M.ALUMNO')
            ->select([
                'M.ID',
                'MA.NOMBRE_MATERIA',
                'P.NOMBRE_COMPLETO',
                'U.CUATRIMESTRE',
                'M.CALIFICACION'
            ])
            ->get();

        return response()->json([
            'ok' => true,
            'data' => $resultados
        ]);
    }
    public function guardarCalificacion(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'calificacion' => 'required|integer|min:0|max:10',
        ]);

        DB::table('MATERIAS_ASIGNADAS')
            ->where('ID', $request->id)
            ->update([
                'CALIFICACION' => $request->calificacion
            ]);

        return response()->json([
            'ok' => true
        ]);
    }

}
