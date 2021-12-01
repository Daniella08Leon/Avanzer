<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Ficha;
use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AprendizController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloaprendiz',['only'=> ['getProyecto']]);
        $this->middleware('soloinstructor',['only'=> ['getDetalleProyecto', 'getAprendicesDeFicha', 'getAprendicesNuevos', 'getUsuariosAdmiCoord']]);
        $this->middleware('solocoordinador',['only'=> ['getDetalleProyectoCoord']]);
    }

    //Me trae el proyecto del que es parte el aprendiz
    public function getProyecto(){
        $result = Aprendiz::getProyectoModel(auth()->user()->idUsuario);
        // return $result;
        $compañeros = Proyecto::getProyectoAprendicesModel($result[1]);
        // return $compañeros;

        return view('aprendiz.proyecto')->with("result", $result)->with("compañeros", $compañeros);
    }

    //Me muestra la informacion del proyecto seleccionado
    public function getDetalleProyecto($idProyecto){
        $result = Aprendiz::getProyectos($idProyecto);
        $ficha = Ficha::getIdFichaModel($idProyecto);
        return view('instructores.proyecto')->with("result", $result)->with("ficha", $ficha);
    }

    //Me trae los aprendices para crear los proyectos
    public function getAprendicesDeFicha($idFicha){ 
        $result = Aprendiz::getAprendicesDeFichaModel($idFicha);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        return view('instructores.crearProyectos')->with("result", $result)->with("ficha", $ficha);
    } 

    //Me trae los aprendices sin grupo para añadirlos
    public function getAprendicesNuevos($idFicha, $idProyecto){
        $result = Aprendiz::getAprendicesNuevosModel($idFicha, $idProyecto);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        return view('instructores.nuevoAprendiz')->with("result", $result)->with("ficha", $ficha);
    } 

    //Crear Aprendiz
    public function crearAprendices(Request $request){ 

        $request->validate([
            'nombreAprendiz' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'apellidoAprendiz' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'documentoAprendiz' => 'required|min:10|unique:aprendizs|numeric',
            'email' => 'required|email|unique:users',
        ]);
        
        $usuario = User::create([
                'idRolFK' => 3, 
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'estadoUsuario' => 1,
        ]); 

        $usuarioApren = Aprendiz::create([
                'idUsuarioFK' => $usuario->idUsuario,
                'idFichaFK' => NULL,
                'nombreAprendiz' => $request['nombreAprendiz'],
                'apellidoAprendiz' => $request['apellidoAprendiz'],
                'documentoAprendiz' => $request['documentoAprendiz'],
        ]);

        alert()->success('    ', 'Aprendiz Creado');
        return redirect('/administrador/usuarios/aprendiz');
    }

    //Editar aprendiz
    public function guardarAprendiz(Request $request){

        $request->validate([
            'nombreAprendiz' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'apellidoAprendiz' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'documentoAprendiz' => 'required|min:10|numeric',
            'email' => 'required|email',
        ]);

        $aprendiz = Aprendiz::findOrFail($request->idAprendiz);
        
        $aprendiz->idUsuarioFK = $request->idUsuarioFK;
        $aprendiz->idFichaFK = $request->idFicha;
        $aprendiz->nombreAprendiz = $request->nombreAprendiz;
        $aprendiz->apellidoAprendiz = $request->apellidoAprendiz;
        $aprendiz->documentoAprendiz = $request->documentoAprendiz;
        $aprendiz->save();

        $usuario = User::findOrFail($request->idUsuarioFK);
        $usuario->email = $request->email;
        $usuario->save();

        alert()->success('    ', 'Aprendiz Actualizado Correctamente');
        return redirect('/administrador/usuarios/aprendiz');
    }

    //Me muestra la informacion del proyecto seleccionado
    public function getDetalleProyectoCoord($idProyecto){
        $result = Aprendiz::getProyectos($idProyecto);
        return view('coordinador.proyecto')->with("result", $result);
    }
}
 