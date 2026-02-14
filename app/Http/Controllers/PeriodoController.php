<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PeriodoController extends Controller
{
    public function index()
    {
        $periodo=collect();
        $periodo = DB::table('PERIODO')
                ->select('ID_PERIODO','PERIODO','DESCRIPCION')
                ->where('ESTATUS', 1)
                ->get();
        return view('periodo', compact('periodo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'PERIODO'     => 'required|numeric|unique:PERIODO,PERIODO',
            'DESCRIPCION' => 'required|string|max:200',
        ]);

        DB::beginTransaction();

        try {
             DB::table('USUARIOS as U')
                ->join('MATERIAS_ASIGNADAS as A', 'A.ALUMNO', '=', 'U.USUARIO')
                ->join('PERIODO as P', 'P.ID_PERIODO', '=', 'A.PERIODO')
                ->where('P.ESTATUS', 1)
                ->whereNotNull('A.ALUMNO')
                ->update([
                    'U.CUATRIMESTRE' => DB::raw("
                        CASE
                            WHEN U.CUATRIMESTRE = 6 THEN 10
                            ELSE U.CUATRIMESTRE + 1
                        END
                    ")
                ]);
            DB::table('PERIODO')
                ->where('ESTATUS', 1)
                ->update(['ESTATUS' => 2]);

            DB::table('PERIODO')->insert([
                'PERIODO'     => $request->PERIODO,
                'DESCRIPCION' => $request->DESCRIPCION,
                'ESTATUS'     => 1
            ]);

            DB::commit();

            return redirect()
                ->back()
                ->with('ok', 'Periodo registrado y activado correctamente');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Ocurrió un error al registrar el periodo');
        }
    }
    
}
