<?php

namespace App\Http\Controllers;

use App\Models\Evidencia_ficha;
use App\Models\Evidencia_aprendiz;
use App\Models\Evidencia;
use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EvidenciaFichaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['getEvidenciasFichas']]);
    }

    // Obtener las evidencias de las fichas para el administrador
    public function getEvidenciasFichas(Request $request){
        $texto = trim($request->get('texto'));
        $result = DB::table('evidencias')
                ->join('evidencia_fichas', 'evidencias.idEvidencia', '=', 'evidencia_fichas.idEvidenciaFK')
                ->join('fichas', 'evidencia_fichas.idFichaFK', '=', 'fichas.idFicha')
                ->orWhere('ficha', 'LIKE', '%'.$texto.'%')
                ->orWhere('nombreEvidencia', 'LIKE', '%'.$texto.'%')
                ->orWhere('faseEvidencia', 'LIKE', '%'.$texto.'%')
                ->paginate(5);
        $ficha = Ficha::select('idFicha', 'ficha')->get();
        $evidencia = Evidencia::select('idEvidencia', 'nombreEvidencia', 'faseEvidencia')->get();
        return view('administrador.evidenciasFichas')->with("result", $result)->with("ficha", $ficha)->with("evidencia", $evidencia)->with("texto", $texto);
    }

    //Crear Evidencia
    public function crearEvidenciasFichas(Request $request){

        $evidenciasSeleccionados = $request->get('evidencia');

        $request->validate([
            'idFichaFK' => 'required',
            'evidencia' => 'required||min:1',
            'fechaInicio' => 'required|date_format:Y-m-d',
            'fechaFin' => 'required|date_format:Y-m-d|after:fechaInicio'
        ]);

        for ($i = 0; $i < count($evidenciasSeleccionados); $i++) {
            Evidencia_ficha::create([
                'idFichaFK' => $request['idFichaFK'],
                'idEvidenciaFK' => $evidenciasSeleccionados[$i],
                'fechaInicio' => $request['fechaInicio'],
                'fechaFin' => $request['fechaFin'],
            ]);
        }
        alert()->success('    ', 'Evidencias Para Las Fichas Creadas Correctamente');
        return redirect('/administrador/lista/evidencias/fichas');
    }

    //Borra el Evidencia Ficha
    public function eliminarEvidenciaFicha($idEvidencia_ficha){ 

        $comp = Evidencia_aprendiz::where('idEvidenciaFKk', '=', $idEvidencia_ficha)->first();
   
        if ($comp === null) {
            $evidencia = Evidencia_ficha::find($idEvidencia_ficha);
            $evidencia->delete();
            alert()->success('    ', 'Evidencia de la Ficha Eliminada');
            return redirect('/administrador/lista/evidencias/fichas');
        } else {
            alert()->error('La evidencia no se puede eliminar porque los aprendices ya han respondido a esta', 'Error');
            return redirect('/administrador/lista/evidencias/fichas');
        }
    }

     //Editar Evidencia Ficha
     public function guardarEvidenciaFicha(Request $request){

        $request->validate([
            'fechaInicio' => 'required|date_format:Y-m-d',
            'fechaFin' => 'required|date_format:Y-m-d|after:fechaInicio',
        ]);
 
        $EviFi = Evidencia_ficha::findOrFail($request->idEvidencia_ficha);
        $EviFi->fechaInicio = $request->fechaInicio;
        $EviFi->fechaFin = $request->fechaFin;
        $EviFi->save();

        $idFichas = Evidencia::getFichaModel($request->idEvidencia_ficha);

        alert()->success('    ', 'Evidencia Actualizada Correctamente');
        return redirect('/instructor/evidencias/'.$idFichas[0]->idFichaFK);
    }
}
