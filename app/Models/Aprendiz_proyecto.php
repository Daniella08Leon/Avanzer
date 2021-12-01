<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Aprendiz;
use App\Models\Proyecto;
use App\Models\Evidencia_aprendiz;


class Aprendiz_proyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "idAprendiz_proyectos";

    protected $fillable = [
        'idAprendizFK',
        'idProyectoFK',
    ];

    function aprendiz(){
        return $this->hasmany(Aprendiz::class, "idAprendizFK","idAprendiz"); 
    }

    function proyectos(){
        return $this->hasmany(Proyecto::class, "idProyectoFK","idProyecto"); 
    }

}
