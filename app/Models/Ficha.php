<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Aprendiz;
use App\Models\Evidencia;
use App\Models\Programa;
use App\Models\Instructor;
use App\Models\Proyecto;
use App\Models\Evidencia_ficha;



class Ficha extends Model
{   
    use HasFactory;

    protected $primaryKey = "idFicha";

    protected $fillable = [
        'idProgramaFK',
        'idInstructorFK',
        'ficha',
        'fechaInicio',
        'fechaFin',
        'estadoFicha',
    ];

    function programa()
    {
        return $this->belongsTo(Programa::class);
    }

    function evidencia_fichas(){
        return $this->belongsToMany(Evidencia_ficha::class, "idFichaFK","idFicha");
    }

    function aprendiz(){
        return $this->hasMany(Aprendiz::class, "idFichaFK", "idFicha");
    }

    function proyectos(){
        return $this->hasMany(Proyecto::class, "idFichaFK", "idFicha");
    }

    function instructores(){
        return $this->hasMany(Instructor::class, "idInstructorFK", "idInstructor"); 
    }

    //Me muestra las fichas del instructor
    public static function getFichasModel($idfichas){
        $result = Instructor::with('fichas') 
                            ->where('instructors.idInstructor','=',$idfichas)
                            ->get();
        return $result;
    }

    //Me muestra los proyectos de las fichas
    public static function getVerProyectosModel($idFicha){
        $result = Proyecto::with('ficha') 
                            ->where('idFichaFK', '=' , $idFicha)
                            ->where('proyectos.estadoProyecto', '=' , 1)
                            ->get();
        return $result;
    }

     //Me consulta el idFicha con el Idproyecto
     public static function getIdFichaModel($idProyecto){
        $result = DB::table('fichas')
                            ->join('proyectos', 'fichas.idFicha', '=', 'proyectos.idFichaFK')
                            ->where('idProyecto', '=' , $idProyecto)
                            ->get('idFicha');
        return $result;
    }

    //Me consulta el idFicha con el Idproyecto
    public static function getIdFichaIDInstModel($idUsuario){
        $result = DB::table('users')
                            ->join('instructors', 'users.idUsuario', '=', 'instructors.idUsuarioFK')
                            ->join('fichas', 'instructors.idInstructor', '=', 'fichas.idInstructorFK')
                            ->where('idUsuario', '=' , $idUsuario)
                            ->get();
        return $result[0];
    }
}



