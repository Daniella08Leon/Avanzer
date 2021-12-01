<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Proyecto;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use SweetAlert;

class FichaController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('solocoordinador',['only'=> ['getVerProyectosCoordinador']]);
        $this->middleware('soloinstructor',['only'=> ['getVerProyectos']]);
    }

    //Me trae los proyectos de la ficha
    public function getVerProyectos($idFicha){
        $result = Ficha::getVerProyectosModel($idFicha);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        return view('instructores.proyectos')->with("result", $result)->with("ficha", $ficha);
    }

    //Editar ficha
    public function guardarFicha(Request $request){

        $request->validate([
            'idProgramaFK' => 'required',
            'idInstructorFK' => 'required',
            'ficha' => 'required|min:5|max:20',
            'fechaInicio' => 'required|date_format:Y-m-d',
            'fechaFin' => 'required|date_format:Y-m-d|after:fechaInicio'
        ]);

        $ficha = Ficha::findOrFail($request->idFicha);
        
        $ficha->idProgramaFK = $request->idProgramaFK;
        $ficha->idInstructorFK = $request->idInstructorFK;
        $ficha->ficha = $request->ficha;
        $ficha->fechaInicio = $request->fechaInicio;
        $ficha->fechaFin = $request->fechaFin;
        $ficha->save();
        
        alert()->success('    ', 'Ficha Editada Correctamente');
        return redirect('/administrador/fichas');
    }

    //Crear ficha
    public function crearFicha(Request $request){

        $request->validate([
            'idProgramaFK' => 'required',
            'idInstructorFK' => 'required',
            'ficha' => 'required|min:5|max:20|unique:fichas',
            'fechaInicio' => 'required|date_format:Y-m-d',
            'fechaFin' => 'required|date_format:Y-m-d|after:fechaInicio',
            'estadoFicha' => 'required'
        ]);

        Ficha::create([
            'idProgramaFK' => $request['idProgramaFK'],
            'idInstructorFK' => $request['idInstructorFK'],
            'ficha' => $request['ficha'],
            'fechaInicio' => $request['fechaInicio'],
            'fechaFin' => $request['fechaFin'],
            'estadoFicha' => $request['estadoFicha'],
        ]);

        alert()->success('    ', 'Ficha Creada');
        return redirect('/administrador/fichas');
    }

    //Agregar aprendices a la ficha
    public function añadirAprendizFicha(Request $request, $idFicha){

        $aprendicesSeleccionados = $request->get('aprendiz');

        $request->validate([
            'aprendiz' => 'required|min:1'
        ]);

        for ($i = 0; $i < count($aprendicesSeleccionados); $i++) {
            Aprendiz::where('idAprendiz', '=', $aprendicesSeleccionados[$i])
                    ->update([
                        'idFichaFK' => $idFicha]);
        }
        alert()->success('    ', 'Aprendices Agregados Correctamente');
        return redirect('/administrador/fichas');
    }


    //Cambia el estado a activo
    public function guardarEstadoActivar($estadoFicha, $idFicha){

        $estado = Ficha::where('estadoFicha', '=', $estadoFicha)
                    ->where('idFicha', '=', $idFicha)
                    ->update([
                        'estadoFicha' => 1]);
        
        alert()->success('    ', 'Ficha Activada');
        return redirect('/administrador/fichas');
    }

    //Cambia el estado a inactivo
    public function guardarEstadoInhabilitar($estadoFicha, $idFicha){

         $estado = Ficha::where('estadoFicha', '=', $estadoFicha)
                    ->where('idFicha', '=', $idFicha)
                    ->update([
                        'estadoFicha' => 0]);
        
        alert()->success('    ', 'Ficha Inactiva');
        return redirect('/administrador/fichas');
    }

    //Me trae los proyectos de la ficha para el coordinador
    public function getVerProyectosCoordinador($idFicha){
        $result = Ficha::getVerProyectosModel($idFicha);
        return view('coordinador.proyectos')->with("result", $result);
    }
} 
