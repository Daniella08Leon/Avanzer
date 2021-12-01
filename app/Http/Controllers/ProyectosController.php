<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Aprendiz;
use App\Models\Ficha;
use App\Models\Aprendiz_proyecto;
use App\Http\Controllers\FichaController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SweetAlert;

class ProyectosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloaprendiz',['only'=> ['gettraerProyectoEditar']]);
    }

    //Crea los proyectos
    public function crearProyecto(Request $request, $idFicha){

        $request->validate([
            'NombreProyecto' => 'required|min:1|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'Descripcion' => 'required|min:1|max:200|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú0-9]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú0-9]+)*$/',
            'aprendiz' => 'required|min:1',
        ]);

        $proyecto = Proyecto::create([
            'idFichaFK' => $idFicha, 
            'nombreProyecto' => $request['NombreProyecto'],
            'descripcionProyecto' => $request['Descripcion'],
            'estadoProyecto' => 1,
        ]); 

        $aprendicesSeleccionados = $request->get('aprendiz');

        for ($i = 0; $i < count($aprendicesSeleccionados); $i++) {
            Aprendiz_proyecto::create([
                'idAprendizFK' => $aprendicesSeleccionados[$i], 
                'idProyectoFK' => $proyecto->idProyecto,
                ]);
        }

        alert()->success('      ', 'Proyecto creado correctamente');
        return redirect('/instructor/crearProyectos/'.$idFicha);
    }

    //Desintegra el grupo
    public function desintegrarGrupo($idProyecto){
        $desintegrar = Proyecto::where('idProyecto', '=', $idProyecto)
                        ->update([
                            'estadoProyecto' => 3,
                        ]);
        alert()->success('    ', 'Proyecto Desintegrado');
        $ficha = Ficha::getIdFichaModel($idProyecto);
        return redirect('/instructor/proyectos/'.$ficha[0]->idFicha);
    }

    //Añade aprendices al proyecto
    public function crearAprendizProyecto(Request $request, $idProyecto){ 

        $aprendicesSeleccionados1 = $request->get('aprendiz');

        $request->validate([
            'aprendiz' => 'required|min:1',
        ]);

        for ($i = 0; $i < count($aprendicesSeleccionados1); $i++) {
            Aprendiz_proyecto::create([
                'idAprendizFK' => $aprendicesSeleccionados1[$i], 
                'idProyectoFK' => $idProyecto,
                ]);
        }
        alert()->success('    ', 'Aprendiz Añadido');
        return redirect('/instructor/proyecto/'.$idProyecto);
    }

    //Trae la informacion del proyecto al formulario
    public function gettraerProyectoEditar($idProyecto){
        $editarProy = Proyecto::findOrFail($idProyecto);
        return view('aprendiz.editarProyecto')->with("editarProy", $editarProy);
    }

    //Edita el proyecto
    public function guardarProyecto(Request $request){

        $request->validate([
            'nombreProyecto' => 'required|min:1|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'descripcionProyecto' => 'required|min:1|max:200|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú0-9]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú0-9]+)*$/',
        ]);

        $proyecto = Proyecto::findOrFail($request->idProyecto);
        
        $proyecto->nombreProyecto = $request->nombreProyecto;
        $proyecto->descripcionProyecto = $request->descripcionProyecto;
        $proyecto->save();
        
        alert()->success('    ', 'Proyecto Editado Correctamente');
        return redirect('/aprendiz/proyecto');
    }
}
