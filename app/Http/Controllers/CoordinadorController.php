<?php

namespace App\Http\Controllers;

use App\Models\Coordinador;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CoordinadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solocoordinador',['only'=> ['getFichas']]);
    } 

    //Me trae las fichas
    public function getFichas(Request $request){
        $texto = trim($request->get('texto'));
        $result = DB::table('instructors')
                    ->join('fichas', 'instructors.idInstructor', '=', 'fichas.idInstructorFK')
                    ->join('programas', 'fichas.idProgramaFK', '=', 'programas.idPrograma')
                    ->where('ficha', 'LIKE', '%'.$texto.'%')
                    ->orWhere('nombreInstructor', 'LIKE', '%'.$texto.'%')
                    ->orWhere('apellidoInstructor', 'LIKE', '%'.$texto.'%')
                    ->orWhere('documentoInstructor', 'LIKE', '%'.$texto.'%')
                    ->paginate(5);
        return view('coordinador.fichas')->with("result", $result)->with("texto", $texto);
    }
}
