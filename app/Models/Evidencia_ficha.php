<?php

namespace App\Models;

use App\Models\Ficha;
use App\Models\Evidencia;
use App\Models\Evidencia_aprendiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Evidencia_ficha extends Model
{
    use HasFactory;

    protected $primaryKey = "idEvidencia_ficha";

    protected $fillable = [
        'idFichaFK',
        'idEvidenciaFK',
        'estadoEvidencia',
        'fechaInicio',
        'fechaFin',	
    ]; 

    function evidencias(){
        return $this->belongsToMany(Evidencia::class, "idEvidenciaFK", "idEvidencia"); 
    }

    function ficha(){
        return $this->belongsToMany(Evidencia::class, "idFichaFK", "idFicha"); 
    }

    function evidenciaAprendizE(){
        return $this->hasMany(Evidencia_aprendiz::class, "idEvidenciaFKk","idEvidenciaFK"); 
    } 

}
