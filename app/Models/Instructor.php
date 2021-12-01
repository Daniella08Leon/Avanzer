<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Anuncio;
use App\Models\Ficha;
use App\Models\Avance;


class Instructor extends Model
{   
    use HasFactory;

    protected $primaryKey = "idInstructor";

    protected $fillable = [
        'idUsuarioFK',
        'nombreInstructor',
        'apellidoInstructor',
        'documentoInstructor',
    ];

    function usuario()
    {
        return $this->belongsTo(User::class, "idUsuarioFK", "idUsuario");
    }

    function anuncio(){
        return $this->hasMany(Anuncio::class); 
    }

    function fichas(){
        return $this->hasMany(Ficha::class, "idInstructorFK", "idInstructor"); 
    }

    function avance(){
        return $this->hasMany(Avance::class,"idInstructorFK","idInstructor");
    } 

    public static function getFichasModel($idUsuario){
        $result = DB::table('users')
                    ->join('instructors', 'instructors.idUsuarioFK', '=', 'users.idUsuario')
                    ->join('fichas', 'fichas.idInstructorFK', '=', 'instructors.idInstructor')
                    ->where('users.idUsuario', '=', $idUsuario)
                    ->get(["idFicha",
                            "idUsuario",
                            "idProgramaFK",
                            "idInstructorFK",
                            "ficha" ,
                            "fechaInicio" ,
                            "fechaFin" ,
                            "estadoFicha" ]);
        return $result;
    }
}
