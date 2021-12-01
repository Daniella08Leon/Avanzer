<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Evidencia_ficha;


class Evidencia extends Model
{
    use HasFactory;

    protected $primaryKey = "idEvidencia";

    protected $fillable = [
        'trimestre',
        'nombreEvidencia',
        'faseEvidencia',
        'evidenciaP',
        'estadoEvidencia',	
    ]; 

    function evidencia_fichas(){
        return $this->belongsToMany(Evidencia_ficha::class, "idEvidenciaFK","idEvidencia");
    }
 
   //Me consulta las evidencias de la ficha
    public static function getEvidenciasModel($idficha){

        $trimestre = DB::table('fichas')
                    ->join('evidencia_fichas', 'evidencia_fichas.idFichaFK', '=', 'fichas.idFicha')
                    ->join('evidencias', 'evidencias.idEvidencia', '=', 'evidencia_fichas.idEvidenciaFK')
                    ->where('fichas.idFicha','=',$idficha)
                    ->distinct()
                    ->get(["trimestre", "idFicha"]);

        $evidencia = DB::table('fichas')
                    ->join('evidencia_fichas', 'evidencia_fichas.idFichaFK', '=', 'fichas.idFicha')
                    ->join('evidencias', 'evidencias.idEvidencia', '=', 'evidencia_fichas.idEvidenciaFK')
                    ->where('fichas.idFicha','=',$idficha)
                    ->paginate(5);

        return [$trimestre,$evidencia];
    }

    //Me consulta las evidencias filtradas
    public static function getEvidenciasConTrimestreModel($idFicha, $trimestre){

        $trimestre1 = DB::table('fichas')
                    ->join('evidencia_fichas', 'evidencia_fichas.idFichaFK', '=', 'fichas.idFicha')
                    ->join('evidencias', 'evidencias.idEvidencia', '=', 'evidencia_fichas.idEvidenciaFK')
                    ->where('fichas.idFicha','=',$idFicha)
                    ->distinct()
                    ->get(["trimestre", "idFicha"]);

        $evidencia = DB::table('fichas')
                    ->join('evidencia_fichas', 'evidencia_fichas.idFichaFK', '=', 'fichas.idFicha')
                    ->join('evidencias', 'evidencias.idEvidencia', '=', 'evidencia_fichas.idEvidenciaFK')
                    ->where('fichas.idFicha','=',$idFicha)
                    ->where('evidencias.trimestre','=', $trimestre)
                    ->paginate(5);

        return [$trimestre1,$evidencia];
    }

    public static function getEvidenciasAprendizModel($idFicha, $idAprendiz){

        $result = DB::table('fichas')
                    ->join('aprendizs', 'fichas.idFicha', '=', 'aprendizs.idFichaFK')
                    ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('evidencias', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->where('evidencia_fichas.estadoEvidenciaFi', '=', 1)
                    ->where('fichas.idFicha','=',$idFicha)
                    ->where('aprendizs.idAprendiz','=', $idAprendiz)
                    ->paginate(5);
        return $result;
    }

    public static function getAprendizSubirEvidenciaModel($idEvidencia, $idAprendiz){
        $result = DB::table('evidencias')
                    ->join('evidencia_fichas', 'evidencia_fichas.idEvidenciaFK', '=', 'evidencias.idEvidencia')
                    ->join('fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                    ->join('aprendizs', 'aprendizs.idFichaFK', '=', 'fichas.idFicha')
                    ->where('evidencias.idEvidencia', '=', $idEvidencia)
                    ->where('aprendizs.idAprendiz', '=', $idAprendiz)
                    ->get();

        return $result;
    }

    public static function getFichaModel($id){
        $idFicha = DB::table('fichas')
                   ->join('evidencia_fichas', 'fichas.idFicha', '=', 'evidencia_fichas.idFichaFK')
                   ->where('evidencia_fichas.idEvidencia_ficha', '=', $id)
                   ->get('idFichaFK');
        return $idFicha;
    }
 
} 
