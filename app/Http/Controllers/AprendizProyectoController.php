<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz_proyecto;
use Illuminate\Http\Request;

class AprendizProyectoController extends Controller
{
    public function eliminarAprendizProyecto($idAprendiz_proyectos){
        $proyecto = Aprendiz_proyecto::select('idProyectoFK')->where('aprendiz_proyectos.idAprendiz_proyectos','=',$idAprendiz_proyectos)->get();
        $AprenProyec = Aprendiz_proyecto::find($idAprendiz_proyectos);
        $AprenProyec->delete();
        alert()->success('    ', 'Aprendiz Eliminado Correctamente');
        return redirect('/instructor/proyecto/'.$proyecto[0]->idProyectoFK);
    }
}
