<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['getFichas', 'getUsuariosAprendiz', 'getUsuariosInstructor', 'getUsuariosAdmiCoord']]);//solo estoy verificando estas rutas 
    }

    //Me trae las fichas
    public function getFichas(Request $request){
        $texto = trim($request->get('texto'));
        $result = DB::table('instructors')
                ->join('fichas', 'instructors.idInstructor', '=', 'fichas.idInstructorFK')
                ->join('programas', 'fichas.idProgramaFK', '=', 'programas.idPrograma')
                ->orWhere('idFicha', 'LIKE', '%'.$texto.'%')
                ->orWhere('ficha', 'LIKE', '%'.$texto.'%')
                ->orWhere('idInstructor', 'LIKE', '%'.$texto.'%')
                ->orWhere('nombreInstructor', 'LIKE', '%'.$texto.'%')
                ->orWhere('apellidoInstructor', 'LIKE', '%'.$texto.'%')
                ->orWhere('documentoInstructor', 'LIKE', '%'.$texto.'%')
                ->paginate(5);
        $instructor = Instructor::select('idInstructor', 'nombreInstructor', 'apellidoInstructor')->get();
        $programa = Programa::select('idPrograma', 'nombrePrograma')->get();
        $aprendiz = Aprendiz::where('idFichaFK', '=', null)->get();
        return view('administrador.fichas')->with("result", $result)->with("instructor", $instructor)->with("programa", $programa)->with("aprendiz", $aprendiz)->with("texto", $texto);
    }

    //Me trae los usuarios aprendices
    public function getUsuariosAprendiz(Request $request){
        $texto = trim($request->get('texto'));
        $result = DB::table('users')
                ->join('aprendizs', 'users.idUsuario', '=', 'aprendizs.idUsuarioFK')
                ->join('fichas', 'aprendizs.idFichaFK', '=', 'fichas.idFicha')
                ->join('rols', 'users.idRolFK', '=', 'rols.idRol')
                ->orWhere('ficha', 'LIKE', '%'.$texto.'%')
                ->orWhere('nombreAprendiz', 'LIKE', '%'.$texto.'%')
                ->orWhere('apellidoAprendiz', 'LIKE', '%'.$texto.'%')
                ->orWhere('documentoAprendiz', 'LIKE', '%'.$texto.'%')
                ->orWhere('email', 'LIKE', '%'.$texto.'%')
                ->paginate(5);
        $ficha = Ficha::select('idFicha', 'ficha')->get();
        return view('administrador.usuariosAprendiz')->with("result", $result)->with("ficha", $ficha)->with("texto", $texto);
    }

    //Me trae los usuarios instructores
    public function getUsuariosInstructor(Request $request){
        $texto = trim($request->get('texto'));
        $result = DB::table('users')
                ->join('instructors', 'users.idUsuario', '=', 'instructors.idUsuarioFK')
                ->join('rols', 'users.idRolFK', '=', 'rols.idRol')
                ->orWhere('nombreInstructor', 'LIKE', '%'.$texto.'%')
                ->orWhere('apellidoInstructor', 'LIKE', '%'.$texto.'%')
                ->orWhere('documentoInstructor', 'LIKE', '%'.$texto.'%')
                ->orWhere('email', 'LIKE', '%'.$texto.'%')
                ->paginate(5);
        return view('administrador.usuariosInstructor')->with("result", $result)->with("texto", $texto);
    }

    //Me trae los usuarios cordinadores y administradores
    public function getUsuariosAdmiCoord(Request $request){
        $texto = trim($request->get('texto'));
        $result = DB::table('users')
                ->join('rols', 'users.idRolFK', '=', 'rols.idRol')
                ->whereIn('idRol', [1, 4])
                ->where('email', 'LIKE', '%'.$texto.'%')
                ->paginate(5);
        return view('administrador.usuariosCoordAdmi')->with("result", $result)->with("texto", $texto);
    }
}
