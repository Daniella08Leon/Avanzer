<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use Illuminate\Http\Request;
use App\Models\Evidencia_aprendiz;
use Illuminate\Support\Facades\DB;
use App\Models\Aprendiz;
use App\Models\Evidencia_ficha;
use App\Models\Aprendiz_proyecto;
use App\Models\Ficha;
use Carbon\Carbon;

class EvidenciaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloaprendiz',['only'=> ['getEvidenciasAprendiz', 'getverEvidencia']]);
        $this->middleware('soloadmin',['only'=> ['getEvidenciasAdmi']]);
        $this->middleware('soloinstructor',['only'=> ['getEvidencias', 'getEvidenciasConTrimestre']]);
    }

    // Obtener las evidencias de la Ficha
    public function getEvidencias($idFicha){
        $result = Evidencia::getEvidenciasModel($idFicha);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        return view('instructores.list')->with("result", $result)->with("ficha", $ficha);
    }

    // Obtener las evidencias filtradas con el trimestre
    public function getEvidenciasConTrimestre($idFicha, $trimestre){
        $result = Evidencia::getEvidenciasConTrimestreModel($idFicha, $trimestre);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        return view('instructores.list')->with("result", $result)->with("ficha", $ficha);
    }

    // Activar las evidencias a los aprendices
    public function activarEvidencias($id){
        Evidencia_ficha::where('idEvidencia_ficha', '=', $id)
                   ->update([
                       'estadoEvidenciaFi' => 1
                   ]);
                 
        // Obtener el id de la ficha para llevarla de nuevo alli
        $idFichas = Evidencia::getFichaModel($id);
        alert()->success('    ', 'Evidencia Activada'); 
        return redirect('/instructor/evidencias/'.$idFichas[0]->idFichaFK);
    }

    // Desactivar las evidencias a los aprendices
    public function desactivarEvidencias($id){
        Evidencia_ficha::where('idEvidencia_ficha', '=', $id)
                   ->update([
                       'estadoEvidenciaFi' => 0
                   ]);
                 
        // Obtener el id de la ficha para llevarla de nuevo alli
        $idFichas = Evidencia::getFichaModel($id);
        alert()->success('    ', 'Evidencia Desactivada'); 
        return redirect('/instructor/evidencias/'.$idFichas[0]->idFichaFK);
    }

    // Obtener las evidencias del aprendiz
    public function getEvidenciasAprendiz($idFicha, $idAprendiz){
        $result1 = Evidencia::getEvidenciasAprendizModel($idFicha, $idAprendiz);
        $result = Aprendiz::getFichaModel(auth()->user()->idUsuario);
        return view('aprendiz.evidencias')->with("result", $result)->with("result1", $result1);
    }

    //Muestra el formulario para subir la evidencia
    public function getverEvidencia($idEvidencia, $idAprendiz){
        $evidencia = Evidencia::getAprendizSubirEvidenciaModel($idEvidencia, $idAprendiz);
        return view('aprendiz.subirEvidencia')->with("evidencia", $evidencia[0]);
    }

    // Subir una evidencia
    public function actualizarEvidencia(Request $request, $idEvidencia, $idAprendiz){

        $request->validate([
            'evidenciaAprendiz' => 'required|url|max:200',
            'comentario' => 'required|min:1|max:150|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú0-9]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú0-9]+)*$/'
        ]);

        //Se obtiene el id del aprendiz y del proyecto al que pertenece
        $aprendiz = DB::table('aprendizs')
                    ->join('aprendiz_proyectos', 'aprendiz_proyectos.idAprendizFK', '=', 'aprendizs.idAprendiz')
                    ->where('aprendizs.idAprendiz', '=', $idAprendiz)
                    ->get();

        //Se crea la evidencia, y se rellenan con los datos consultados anteriormente
        Evidencia_aprendiz::create([
            'idEvidenciaFKk' => $idEvidencia,
            'idProyectoFK' => $aprendiz[0]->idProyectoFK,
            'idAprendizFK' => $aprendiz[0]->idAprendiz,
            'evidenciaAprendiz' => $request['evidenciaAprendiz'],
            'comentario' => $request['comentario'],
            'fechaevidencia' => Carbon::now(),

        ]);

        alert()->success('    ', 'Evidencia Subida'); 
        return redirect('/aprendiz/evidencias/'.$aprendiz[0]->idFichaFK.'/'.$aprendiz[0]->idAprendiz);
    }

    // Obtener las evidencias para el administrador
    public function getEvidenciasAdmi(Request $request){ 
        $texto = trim($request->get('texto'));
        $result = DB::table('evidencias')
                ->orWhere('trimestre', 'LIKE', '%'.$texto.'%')
                ->orWhere('nombreEvidencia', 'LIKE', '%'.$texto.'%')
                ->orWhere('faseEvidencia', 'LIKE', '%'.$texto.'%')
                ->paginate(5);
        return view('administrador.evidencias')->with("result", $result)->with("texto", $texto);
    }

    //Cambia el estado a activo evidencia
    public function estadoActivar($estadoEvidencia, $idEvidencia){

        $estado = Evidencia::where('estadoEvidencia', '=', $estadoEvidencia)
                    ->where('idEvidencia', '=', $idEvidencia)
                    ->update([
                        'estadoEvidencia' => 1]);
        
        alert()->success('    ', 'Evidencia Activada');
        return redirect('/administrador/lista/evidencias');
    }

    //Cambia el estado a inactivo evidencia
    public function estadoInhabilitar($estadoEvidencia, $idEvidencia){

         $estado = Evidencia::where('estadoEvidencia', '=', $estadoEvidencia)
                    ->where('idEvidencia', '=', $idEvidencia)
                    ->update([
                        'estadoEvidencia' => 0]);
        
        alert()->success('    ', 'Evidencia Desactivada');
        return redirect('/administrador/lista/evidencias');
    }

    //Editar evidencia
    public function guardarEvidenciaAd(Request $request){

        $request->validate([
            'trimestre' => 'required',
            'nombreEvidencia' => 'required|min:5|max:100|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú0-9]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú0-9]+)*$/',
            'faseEvidencia' => 'required',
            'evidenciaP' => 'required|url',
        ]);

        $evidencia = Evidencia::findOrFail($request->idEvidencia);
        
        $evidencia->trimestre = $request->trimestre;
        $evidencia->nombreEvidencia = $request->nombreEvidencia;
        $evidencia->faseEvidencia = $request->faseEvidencia;
        $evidencia->evidenciaP = $request->evidenciaP;
        $evidencia->save();

        alert()->success('    ', 'Evidencia Actualizada Correctamente');
        return redirect('/administrador/lista/evidencias');
    }

    //Crear Evidencia
    public function crearEvidencias(Request $request){

        $request->validate([
            'trimestre' => 'required',
            'nombreEvidencia' => 'required|min:5|max:100|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú0-9]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú0-9]+)*$/',
            'faseEvidencia' => 'required',
            'evidenciaP' => 'required|url',
        ]);

        $evidencia = Evidencia::create([
                'trimestre' => $request['trimestre'],
                'nombreEvidencia' => $request['nombreEvidencia'],
                'faseEvidencia' => $request['faseEvidencia'],
                'evidenciaP' => $request['evidenciaP'],
                'estadoEvidencia' => 1,
        ]);

        alert()->success('    ', 'Evidencia Creada');
        return redirect('/administrador/lista/evidencias');
    }

}
