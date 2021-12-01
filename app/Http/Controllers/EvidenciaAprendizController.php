<?php

namespace App\Http\Controllers;

use App\Models\Evidencia_aprendiz;
use App\Models\Ficha;
use App\Models\Aprendiz;
use Illuminate\Http\Request;

class EvidenciaAprendizController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloaprendiz',['only'=> ['getEvidenciasAprendizProyecto']]);
        $this->middleware('soloinstructor',['only'=> ['getEvidenciasProyecto']]);
    }
    
    //Me trae las evidencias para que lo vea el aprendiz
    public function getEvidenciasAprendizProyecto($idAprendiz){
        $result1 = Evidencia_aprendiz::getEvidenciasProyectosDesinteModel($idAprendiz);
        $result = Aprendiz::getFichaModel(auth()->user()->idUsuario);
        return view('aprendiz.evidenciasSubidas')->with("result", $result)->with("result1", $result1);
    }

    //Me trae las evidencias para que lo vea el instructor
    public function getEvidenciasProyecto($idProyecto){
        $result = Evidencia_aprendiz::getEvidenciasProyectosModel($idProyecto);
        $ficha = Ficha::getIdFichaModel($idProyecto);
        return view('instructores.evidenciaProyecto')->with("result", $result)->with("ficha", $ficha);
    }

    //Edita el proyecto
    public function guardarEvidencia(Request $request){

        $request->validate([
            'evidenciaAprendiz' => 'required|url|max:200',
            'comentario' => 'required|min:1|max:150|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú0-9]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú0-9]+)*$/'
        ]);

        $evidencia = Evidencia_aprendiz::findOrFail($request->idEvidenciaAprendiz);
        
        $evidencia->evidenciaAprendiz = $request->evidenciaAprendiz;
        $evidencia->comentario = $request->comentario;
        $evidencia->save();

        $proyecto = Evidencia_aprendiz::select('idProyectoFK')->where('evidencia_aprendizs.idEvidenciaAprendiz','=',$request->idEvidenciaAprendiz)->get();

        alert()->success('    ', 'Evidencia Editada Correctamente'); 
        return redirect('/evidencias/proyecto/'.$proyecto[0]->idProyectoFK);
    }

}
