<?php

namespace App\Http\Controllers;
use App\Models\Avance;
use App\Models\Evidencia_aprendiz;
use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class AvanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloaprendiz',['only'=> ['getAvancesAprendiz']]);
        $this->middleware('soloinstructor',['only'=> ['getEvidenciaAvance', 'getEvidenciasConEvidencias', 'getAvances', 'getAvancesFiltrados']]);
        $this->middleware('solocoordinador',['only'=> ['getAvancesCoordinador']]);
    }

    //Me trae las evidencias de los proyectos
    public function getEvidenciaAvance($idFichaFK){
        $result = Avance::getEvidenciaAvanceModel($idFichaFK);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFichaFK)->get();
        return view('instructores.crearAvance')->with("result", $result)->with("ficha", $ficha);
    }

    //Obtener las evidencias filtradas con la evidencia
    public function getEvidenciasConEvidencias($idFicha, $idEvidenciaFK){
        $result = Avance::getEvidenciasConEvidenciaModel($idFicha, $idEvidenciaFK);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        return view('instructores.crearAvance')->with("result", $result)->with("ficha", $ficha);
    }

    //Me crea los avances 
    public function crearAvance(Request $request, $idInstructorFK){

        $request->validate([
            'avances' => 'required|max:200'
        ]);

        $evidencias = $request->get('evidencia');

        $proyecto = $request->get('proyecto');

        $avance = $request->get('avances');

        for ($i = 0; $i < count($evidencias); $i++) {
            Avance::create([
                'idEvidenciaAprendizFK' => $evidencias[$i],
                'idProyectoFK' => $proyecto[$i],
                'idInstructorFK' => $idInstructorFK,
                'fechaAvance' => Carbon::now(),
                'avance' => $avance[$i],
                ]);
        }

        $idFicha = DB::table('avances')
                   ->join('evidencia_aprendizs', 'avances.idEvidenciaAprendizFK', '=', 'evidencia_aprendizs.idEvidenciaAprendiz')
                   ->join('evidencia_fichas', 'evidencia_aprendizs.idEvidenciaFKk', '=', 'evidencia_fichas.idEvidenciaFK')
                   ->where('evidencia_fichas.idFichaFK', '=', $idInstructorFK)
                   ->get('idFichaFK');

        alert()->success('    ', 'Avances Creados'); 
        return redirect('/instructor/avance/'.$idFicha[0]->idFichaFK);
    }

    // // Obtener los avances 
    public function getAvances($idFichaFK){
        $result = Avance::getAvancesModel($idFichaFK);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFichaFK)->get();
        $idEvidenciaFK = (0);
        return view('instructores.avances')->with("result", $result)->with("ficha", $ficha)->with("idEvidenciaFK", $idEvidenciaFK)->with("idFichaFK", $idFichaFK);
    }

    // // Obtener los avances filtrados
    public function getAvancesFiltrados($idFicha, $idEvidenciaFK){
        $result = Avance::getAvancesFiltradosModel($idFicha, $idEvidenciaFK);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        $idFichaFK = $idFicha;
        return view('instructores.avances')->with("result", $result)->with("ficha", $ficha)->with("idEvidenciaFK", $idEvidenciaFK)->with("idFichaFK", $idFichaFK);
    }

    //Edita el avance
    public function cambiarAvance(Request $request){

        $request->validate([
            'avance' => 'required|min:5|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/'
        ]);

        $avance = Avance::findOrFail($request->idAvance);
        
        $avance->avance = $request->avance;
        $avance->save();

        $idFicha = DB::table('avances')
                   ->join('evidencia_aprendizs', 'avances.idEvidenciaAprendizFK', '=', 'evidencia_aprendizs.idEvidenciaAprendiz')
                   ->join('evidencia_fichas', 'evidencia_aprendizs.idEvidenciaFKk', '=', 'evidencia_fichas.idEvidenciaFK')
                   ->where('avances.idAvance', '=', $request->idAvance)
                   ->get();

        alert()->success('    ', 'Avance Editado Correctamente'); 
        return redirect('/instructor/verAvancesFiltrados/'.$idFicha[0]->idFichaFK.'/'.$idFicha[0]->idEvidenciaFK);
    }

    //Borra el avance
    public function eliminarAvance($idAvance){
        
        $idFicha = DB::table('avances')
                   ->join('evidencia_aprendizs', 'avances.idEvidenciaAprendizFK', '=', 'evidencia_aprendizs.idEvidenciaAprendiz')
                   ->join('evidencia_fichas', 'evidencia_aprendizs.idEvidenciaFKk', '=', 'evidencia_fichas.idEvidenciaFK')
                   ->where('avances.idAvance', '=', $idAvance)
                   ->get();

        $avance = Avance::find($idAvance);

        $avance->delete();

        alert()->success('    ', 'Avance Eliminado'); 
        return redirect('/instructor/verAvancesFiltrados/'.$idFicha[0]->idFichaFK.'/'.$idFicha[0]->idEvidenciaFK);
    }

    // Obtener los avances para el aprendiz
    public function getAvancesAprendiz($idProyecto){
        $result1 = Avance::getAvancesAprendizModel($idProyecto);
        $result = Aprendiz::getFichaModel(auth()->user()->idUsuario);
        return view('aprendiz.avances')->with("result", $result)->with("result1", $result1);
    }

    // Obtener los avances para el Coordinador
    public function getAvancesCoordinador($idProyecto){
        $result1 = Avance::getAvancesAprendizModel($idProyecto);
        return view('coordinador.evidenciaProyecto')->with("result1", $result1);
    }

    // // Obtener los avances filtrados para el PDF
    public function getAvancesFiltradosPDF($idFichaFK, $idEvidenciaFK){
        $result = Avance::getAvancesFiltradosModel($idFichaFK, $idEvidenciaFK);
        $pdf = PDF::loadView('instructores.pdf', ['result'=>$result]);
        return $pdf->download('Avances.pdf');
    }

}
