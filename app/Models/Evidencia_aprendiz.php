<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Aprendiz;
use App\Models\Proyecto;
use App\Models\Evidencia_ficha;
use App\Models\Avance;


class Evidencia_aprendiz extends Model
{
    use HasFactory;

    protected $primaryKey = "idEvidenciaAprendiz";

    protected $fillable = [
        'idevidencia_aprendiz',
        'idProyectoFK',
        'idEvidenciaFKk',
        'idAprendizFK',  
        'evidenciaAprendiz',
        'comentario',
        'fechaevidencia',
    ];

    function evidenciasF()
    {
        return $this->belongsTo(Evidencia_ficha::class, "idEvidenciaFKk","idEvidenciaFK");
    }

    function proyecto()
    {
        return $this->belongsTo(Proyecto::class, "idProyectoFK", "idProyecto");
    }

    function aprendiz()
    {
        return $this->belongsTo(Aprendiz::class);
    }

    function avance(){
        return $this->hasMany(Avance::class,"idEvidenciaAprendizFK","idEvidenciaAprendiz");
    }

    public static function getEvidenciasProyectosDesinteModel($idAprendiz){
        $result = DB::table('proyectos')
                    ->join('aprendiz_proyectos', 'proyectos.idProyecto', '=', 'aprendiz_proyectos.idProyectoFK')
                    ->join('aprendizs', 'aprendiz_proyectos.idAprendizFK', '=', 'aprendizs.idAprendiz')
                    ->join('evidencia_aprendizs', 'proyectos.idProyecto', '=', 'evidencia_aprendizs.idProyectoFK')
                    ->where('aprendiz_proyectos.idAprendizFK', '=', $idAprendiz)
                    ->paginate(5);                    
        return $result;
    }

    //Me consulta las evidencias del proyecto
    public static function getEvidenciasProyectosModel($idProyecto){
        $result = DB::table('evidencia_aprendizs')
                    ->join('proyectos', 'proyectos.idProyecto', '=', 'evidencia_aprendizs.idProyectoFK')
                    ->where('proyectos.idProyecto', '=', $idProyecto)
                    ->paginate(5);
        return $result;
    }
}
