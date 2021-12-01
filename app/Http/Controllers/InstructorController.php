<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class InstructorController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('soloinstructor',['only'=> ['getFichas']]);
    }
    
    public function getFichas(){
        $result = Instructor::getFichasModel(auth()->user()->idUsuario);
        return view('instructores.ficha')->with("result", $result);
    }

    //Crear Instructor
    public function crearInstructores(Request $request){

        $request->validate([
            'nombreInstructor' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'apellidoInstructor' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'documentoInstructor' => 'required|min:10|unique:instructors|numeric',
            'email' => 'required|email|unique:users',
        ]);
        
        $usuario = User::create([
                'idRolFK' => 2, 
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'estadoUsuario' => 1,
        ]);  

        $usuarioInst = Instructor::create([
                'idUsuarioFK' => $usuario->idUsuario,
                'nombreInstructor' => $request['nombreInstructor'],
                'apellidoInstructor' => $request['apellidoInstructor'],
                'documentoInstructor' => $request['documentoInstructor'],
        ]);

        alert()->success('    ', 'Instructor Creado');
        return redirect('/administrador/usuarios/instructor');
    }

    //Editar Instructor
    public function guardarInstructor(Request $request){

        $request->validate([
            'nombreInstructor' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'apellidoInstructor' => 'required|min:5|max:50|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'documentoInstructor' => 'required|min:10|numeric',
            'email' => 'required|email',
        ]);

        $instructor = Instructor::findOrFail($request->idInstructor);
        
        $instructor->idUsuarioFK = $request->idUsuarioFK;
        $instructor->nombreInstructor = $request->nombreInstructor;
        $instructor->apellidoInstructor = $request->apellidoInstructor;
        $instructor->documentoInstructor = $request->documentoInstructor;
        $instructor->save();

        $usuario = User::findOrFail($request->idUsuarioFK);
        $usuario->email = $request->email;
        $usuario->save();

        alert()->success('    ', 'Instructor Actualizado Correctamente');
        return redirect('/administrador/usuarios/instructor');
    }
}
