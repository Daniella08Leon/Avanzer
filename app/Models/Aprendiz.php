<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Evidencia_aprendiz;
use App\Models\Proyecto;
use App\Models\Ficha;
use App\Models\User;
use App\Models\Aprendiz_proyecto;



class Aprendiz extends Model
{
    use HasFactory;

    protected $primaryKey = "idAprendiz";

    protected $fillable = [
        'idUsuarioFK',
        'idFichaFK',
        'nombreAprendiz',
        'apellidoAprendiz',
        'documentoAprendiz',
    ];

    function usuario(){
        return $this->belongsTo(User::class, "idUsuarioFK", "idUsuario");
    }

    function fichas(){ 
        return $this->belongsTo(Ficha::class,"idFichaFK","idFicha");
    }

    function aprendiz_proyecto(){
        return $this->hasmany(Aprendiz_proyecto::class, "idAprendizFK","idAprendiz");
    }

    function evidenciaAprendizA(){
        return $this->hasMany(Evidencia_aprendiz::class);
    }

    public static function getProyectoModel($idUsuario){
        $result = DB::table('users')
                    ->join('aprendizs', 'users.idUsuario', '=', 'aprendizs.idUsuarioFK')
                    ->join('aprendiz_proyectos', 'aprendizs.idAprendiz', '=', 'aprendiz_proyectos.idAprendizFK')
                    ->join('proyectos', 'aprendiz_proyectos.idProyectoFK', '=', 'proyectos.idProyecto')
                    ->where('proyectos.estadoProyecto', '=', 1)
                    ->where('users.idUsuario', '=', $idUsuario)
                    ->get();
        $result2 = DB::table('users')
                    ->join('aprendizs', 'users.idUsuario', '=', 'aprendizs.idUsuarioFK')
                    ->join('aprendiz_proyectos', 'aprendizs.idAprendiz', '=', 'aprendiz_proyectos.idAprendizFK')
                    ->join('proyectos', 'aprendiz_proyectos.idProyectoFK', '=', 'proyectos.idProyecto')
                    ->where('proyectos.estadoProyecto', '=', 1)
                    ->where('users.idUsuario', '=', $idUsuario)
                    ->get('idProyectoFK');
        return [$result[0],$result2[0]];
    }

    public static function getProyectos($idProyecto){
        $result = DB::table('aprendiz_proyectos')
                    ->join('aprendizs', 'aprendiz_proyectos.idAprendizFK', '=', 'aprendizs.idAprendiz')
                    ->where('aprendiz_proyectos.idProyectoFK', '=', $idProyecto)
                    ->get()->toArray();
        $proyecto = DB::table('fichas')
                    ->join('proyectos', 'fichas.idFicha', '=', 'proyectos.idFichaFK')
                    ->where('proyectos.idProyecto', '=', $idProyecto)
                    ->get();
        return [$result, $proyecto[0]];
    }

    public static function getAprendicesDeFichaModel($idFicha){
        $idAprendicesProy = DB::table('aprendiz_proyectos')
                    ->join('proyectos', 'proyectos.idProyecto', '=', 'aprendiz_proyectos.idProyectoFK')
                    ->where('proyectos.estadoProyecto','!=', 3)
                    ->pluck('idAprendizFK')->all();
        $aprendices = DB::table('aprendizs')
                    ->where('aprendizs.idFichaFK','=', $idFicha)
                    ->whereNotIn('idAprendiz', $idAprendicesProy)->get();

        $ficha = Ficha::where('idFicha','=', $idFicha)->get();

        return [$aprendices,$ficha[0]];
    }

    public static function getAprendicesNuevosModel($idFicha, $idProyecto){
        $idAprendicesProy = DB::table('aprendiz_proyectos')
                    ->join('proyectos', 'proyectos.idProyecto', '=', 'aprendiz_proyectos.idProyectoFK')
                    ->where('proyectos.estadoProyecto','!=', 3)
                    ->pluck('idAprendizFK')->all();

        $aprendices = DB::table('aprendizs')
                    ->where('aprendizs.idFichaFK','=', $idFicha)
                    ->whereNotIn('idAprendiz', $idAprendicesProy)->get();

        $ficha = DB::table('fichas')
                    ->join('proyectos', 'proyectos.idFichaFK', '=', 'fichas.idFicha')
                    ->where('proyectos.idProyecto','=', $idProyecto)
                    ->get();
        return [$aprendices,$ficha[0]];
    }

    public static function getFichaModel($idUsuario){
        $result = DB::table('users')
                    ->join('aprendizs', 'users.idUsuario', '=', 'aprendizs.idUsuarioFK')
                    ->join('aprendiz_proyectos', 'aprendizs.idAprendiz', '=', 'aprendiz_proyectos.idAprendizFK')
                    ->join('proyectos', 'aprendiz_proyectos.idProyectoFK', '=', 'proyectos.idProyecto')
                    ->where('proyectos.estadoProyecto', '=', 1)
                    ->where('users.idUsuario', '=', $idUsuario)
                    ->get();
        return $result; 
    }
}
