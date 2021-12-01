<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Evidencia_aprendiz;
use App\Models\Ficha;
use App\Models\Aprendiz;
use App\Models\Avance;
use App\Models\Aprendiz_proyecto;
 

class Proyecto extends Model
{
    use HasFactory; 

    protected $primaryKey = "idProyecto";

    protected $fillable = [
        'idFichaFK',
        'nombreProyecto',
        'descripcionProyecto',
        'estadoProyecto',
    ]; 

    function evidenciaAprendizP(){
        return $this->hasMany(Evidencia_aprendiz::class);
    }

    function ficha(){
        return $this->belongsTo(Ficha::class, "idFichaFK", "idFicha");
    }

    function aprendiz_proyecto(){
        return $this->hasmany(Aprendiz_proyecto::class, "idProyectoFK","idProyecto");
    }
 
    function avance(){
        return $this->hasMany(Avance::class,"idProyectoFK","idProyecto");
    }


    function evidenciaS(){
        return $this->hasMany(Evidencia_aprendiz::class, "idProyectoFK", "idProyecto");
    }
    
    public static function getProyectoAprendicesModel($result){
        $result = DB::table('proyectos')
                    ->join('aprendiz_proyectos', 'proyectos.idProyecto', '=', 'aprendiz_proyectos.idProyectoFK')
                    ->join('aprendizs', 'aprendiz_proyectos.idAprendizFK', '=', 'aprendizs.idAprendiz')
                    ->where('proyectos.idProyecto', '=', $result->idProyectoFK)
                    ->get();
        return $result;
    }
}
