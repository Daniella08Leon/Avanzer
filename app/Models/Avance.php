<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Evidencia_aprendiz;
use App\Models\Proyecto;
use App\Models\Instructor;

class Avance extends Model
{
    use HasFactory;

    protected $primaryKey = "idAvance";

    protected $fillable = [
        'idEvidenciaAprendizFK',
        'idProyectoFK',
        'idInstructorFK',
        'fechaAvance',
        'avance',
    ]; 

    function evidencia_aprendiz()
    {
        return $this->belongsTo(Evidencia_aprendiz::class,"idEvidenciaAprendizFK","idEvidenciaAprendiz");
    }

    function proyecto()
    {
        return $this->belongsTo(Proyecto::class,"idProyectoFK","idProyecto");
    }

    function instructor()
    {
        return $this->belongsTo(Instructor::class,"idInstructorFK","idInstructor");
    }

    //Me consulta las evidencias de los proyectos
    public static function getEvidenciaAvanceModel($idFichaFK){
        $evidencia = DB::table('fichas')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->where('fichas.idFicha', '=', $idFichaFK)
                    ->distinct()
                    ->get(["idEvidenciaFK", "nombreEvidencia", "idFicha"]);

        $result = DB::table('fichas')
                    ->join('proyectos', 'fichas.idFicha', '=', 'proyectos.idFichaFK')
                    ->join('evidencia_aprendizs', 'proyectos.idProyecto', '=', 'evidencia_aprendizs.idProyectoFK')
                    ->join('evidencias', 'evidencia_aprendizs.idEvidenciaFKk', '=', 'evidencias.idEvidencia')
                    ->where('fichas.idFicha', '=', $idFichaFK)
                    ->get();
        return [$evidencia, $result];
    }

    //Me consulta las evidencias de los proyectos filtradas por la evidencia
    public static function getEvidenciasConEvidenciaModel($idFicha, $idEvidenciaFK){

        $evidencia = DB::table('fichas')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->where('fichas.idFicha', '=', $idFicha)
                    ->distinct()
                    ->get(["idEvidenciaFK", "nombreEvidencia", "idFicha"]);

        $result = DB::table('fichas')
                    ->join('proyectos', 'fichas.idFicha', '=', 'proyectos.idFichaFK')
                    ->join('evidencia_aprendizs', 'proyectos.idProyecto', '=', 'evidencia_aprendizs.idProyectoFK')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->where('fichas.idFicha','=',$idFicha)
                    ->where('evidencia_aprendizs.idEvidenciaFKk','=', $idEvidenciaFK)
                    ->where('evidencia_fichas.idEvidenciaFK','=', $idEvidenciaFK)
                    ->get();
                    
        return [$evidencia,$result];
    }

    //Me consulta las evidencias para mostrar los avances
    public static function getAvancesModel($idFichaFK){
 
        $avance = DB::table('fichas')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->where('fichas.idFicha', '=', $idFichaFK)
                    ->distinct()
                    ->get(["idEvidenciaFK", "nombreEvidencia", "idFicha"]);
        
        $result = DB::table('fichas')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencia_aprendizs', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencia_aprendizs.idEvidenciaFKk')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->join('proyectos', 'evidencia_aprendizs.idProyectoFK', '=', 'proyectos.idProyecto')
                    ->join('avances', 'evidencia_aprendizs.idEvidenciaAprendiz', '=', 'avances.idEvidenciaAprendizFK')
                    ->where('fichas.idFicha','=',$idFichaFK)
                    ->paginate(5);
                    
        return [$avance,$result];
    }

    //Me consulta los avances filtrados por la evidencia
    public static function getAvancesFiltradosModel($idFichaFK, $idEvidenciaFK){

        $evidencia = DB::table('fichas')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->where('fichas.idFicha', '=', $idFichaFK)
                    ->distinct()
                    ->get(["idEvidenciaFK", "nombreEvidencia", "idFicha"]);

        $result = DB::table('fichas')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencia_aprendizs', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencia_aprendizs.idEvidenciaFKk')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->join('proyectos', 'evidencia_aprendizs.idProyectoFK', '=', 'proyectos.idProyecto')
                    ->join('avances', 'evidencia_aprendizs.idEvidenciaAprendiz', '=', 'avances.idEvidenciaAprendizFK')
                    ->where('fichas.idFicha','=',$idFichaFK)
                    ->where('evidencia_aprendizs.idEvidenciaFKk','=', $idEvidenciaFK)
                    ->where('evidencia_fichas.idEvidenciaFK','=', $idEvidenciaFK)
                    ->paginate(5);
                    
        return [$evidencia,$result];
    }

    //Me consulta los avances para lso aprendices 
    public static function getAvancesAprendizModel($idProyecto){

        $result = DB::table('proyectos')
                    ->join('avances', 'proyectos.idProyecto', '=', 'avances.idProyectoFK')
                    ->join('evidencia_aprendizs', 'avances.idEvidenciaAprendizFK', '=', 'evidencia_aprendizs.idEvidenciaAprendiz')
                    ->where('avances.idProyectoFK','=',$idProyecto)
                    ->get();
                    
        return $result;
    }
}
