<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ficha;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //Cambia el estado a activo 
    public function guardarEstadoActivar($estadoUsuario, $idUsuario){

        $estado = User::where('estadoUsuario', '=', $estadoUsuario)
                    ->where('idUsuario', '=', $idUsuario)
                    ->update([
                        'estadoUsuario' => 1]);
        
        alert()->success('    ', 'Aprendiz Activado');
        return redirect('/administrador/usuarios/aprendiz');
    }

    //Cambia el estado a inactivo
    public function guardarEstadoInhabilitar($estadoUsuario, $idUsuario){

         $estado = User::where('estadoUsuario', '=', $estadoUsuario)
                    ->where('idUsuario', '=', $idUsuario)
                    ->update([
                        'estadoUsuario' => 0]);
        
        alert()->success('    ', 'Aprendiz Desactivado');
        return redirect('/administrador/usuarios/aprendiz');
    }

    //Cambia el estado a activo instructor
    public function guardarEstadoActivarI($estadoUsuario, $idUsuario){

        $estado = User::where('estadoUsuario', '=', $estadoUsuario)
                    ->where('idUsuario', '=', $idUsuario)
                    ->update([
                        'estadoUsuario' => 1]);
        
        alert()->success('    ', 'Instructor Activado');
        return redirect('/administrador/usuarios/instructor');
    }

    //Cambia el estado a inactivo instructor
    public function guardarEstadoInhabilitarI($estadoUsuario, $idUsuario){

         $estado = User::where('estadoUsuario', '=', $estadoUsuario)
                    ->where('idUsuario', '=', $idUsuario)
                    ->update([
                        'estadoUsuario' => 0]);
        
        alert()->success('    ', 'Instructor Desactivado');
        return redirect('/administrador/usuarios/instructor');
    }

    //Cambia el estado a activo Coordinador y Administrador
    public function guardarEstadoActivarCA($estadoUsuario, $idUsuario){

        $estado = User::where('estadoUsuario', '=', $estadoUsuario)
                    ->where('idUsuario', '=', $idUsuario)
                    ->update([
                        'estadoUsuario' => 1]);
        
        alert()->success('    ', 'Usuario Activado');
        return redirect('/administrador/usuarios/coordinador/administrador');
    }

    //Cambia el estado a inactivo Coordinador y Administrador
    public function guardarEstadoInhabilitarCA($estadoUsuario, $idUsuario){

         $estado = User::where('estadoUsuario', '=', $estadoUsuario)
                    ->where('idUsuario', '=', $idUsuario)
                    ->update([
                        'estadoUsuario' => 0]);
        
        alert()->success('    ', 'Usuario Desactivado');
        return redirect('/administrador/usuarios/coordinador/administrador');
    }

    
    //Crear Usuario Coordinador - Admi
    public function crearUsuarios(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        
        $usuario = User::create([
                'idRolFK' => $request['idRolFK'], 
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'estadoUsuario' => 1,
        ]); 

        alert()->success('    ', 'Usuario Creado');
        return redirect('/administrador/usuarios/coordinador/administrador');
    }

    //Editar Usuario Coordinador - Admi
    public function guardarUsuarios(Request $request){

        $request->validate([
            'email' => 'required|email',
        ]);

        $usuario = User::findOrFail($request->idUsuario);
        $usuario->email = $request->email;
        $usuario->save();

        alert()->success('    ', 'Usuario Actualizado Correctamente');
        return redirect('/administrador/usuarios/coordinador/administrador');
    }

    //Mostar perfil Admi
    public function getPerfil(){
        $result = User::where('users.idUsuario','=',auth()->user()->idUsuario)->get();
        $ficha = Ficha::select('idFicha', 'ficha')->get();
        // return $result;
        return view('administrador.perfil')->with("result", $result)->with("ficha", $ficha);
    }

    //Editar usuario Admi
    public function editarPerfilA(Request $request){

        $request->validate([
            'password' => 'required|min:8|regex:/^[ÁÉÍÓÚA-Z0-9][a-záéíóú0-9]*[#$@!%&*?]$/',
            'password1' => 'required|same:password|min:8'
        ]);

        $usuario = User::findOrFail($request->idUsuario);
        $usuario->password =  Hash::make($request['password']);
        $usuario->save();

        alert()->success('    ', 'Contraseña Actualizada Correctamente');
        return redirect('/administrador/perfil');
    }

    //Mostar perfil Aprendiz 
    public function getPerfilApren(){
        $result1 = User::where('users.idUsuario','=',auth()->user()->idUsuario)->get();
        $result = Aprendiz::getFichaModel(auth()->user()->idUsuario);
        // return $result;
        return view('aprendiz.perfil')->with("result", $result)->with("result1", $result1);
    }

    //Editar usuario Aprendiz
    public function editarPerfilAn(Request $request){
        
        $request->validate([
            'password' => 'required|min:8|regex:/^[ÁÉÍÓÚA-Z0-9][a-záéíóú0-9]*[#$@!%&*?]$/',
            'password1' => 'required|same:password|min:8'
        ]);

        $usuario = User::findOrFail($request->idUsuario);

        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        alert()->success('    ', 'Contraseña Actualizada Correctamente');
        return redirect('/aprendiz/perfil');
    }

    //Mostar perfil instructor
    public function getPerfilInst($idFicha){
        $result1 = User::where('users.idUsuario','=',auth()->user()->idUsuario)->get();
        $result = Ficha::getIdFichaIDInstModel(auth()->user()->idUsuario);
        $ficha = Ficha::select('idFicha')->where('fichas.idFicha','=',$idFicha)->get();
        // return $result;
        return view('instructores.perfil')->with("result", $result)->with("result1", $result1)->with("ficha", $ficha);
    }

    //Editar usuario instructor
    public function editarPerfilIns(Request $request, $idFicha){

        $request->validate([
            'password' => 'required|min:8|regex:/^[ÁÉÍÓÚA-Z0-9][a-záéíóú0-9]*[#$@!%&*?]$/',
            'password1' => 'required|same:password|min:8'
        ]);
        
        $usuario = User::findOrFail($request->idUsuario);
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        alert()->success('    ', 'Contraseña Actualizada Correctamente');
        return redirect('/instructor/perfil/'.$idFicha);
    }

    //Mostar perfil Coord
    public function getPerfilCoor(){
        $result = User::where('users.idUsuario','=',auth()->user()->idUsuario)->get();
        // return $result;
        return view('coordinador.perfil')->with("result", $result);
    }

    //Editar usuario Coord
    public function editarPerfilCoor(Request $request){
        
        $request->validate([
            'password' => 'required|min:8|regex:/^[ÁÉÍÓÚA-Z0-9][a-záéíóú0-9]*[#$@!%&*?]$/',
            'password1' => 'required|same:password|min:8'
        ]);

        $usuario = User::findOrFail($request->idUsuario);
        $usuario->password =  Hash::make($request['password']);
        $usuario->save();

        alert()->success('    ', 'Contraseña Actualizada Correctamente');
        return redirect('/coordinador/perfil');
    }
}
