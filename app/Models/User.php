<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Rol;
use App\Models\Aprendiz;
use App\Models\Instructor;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = "idUsuario";

    function rol()
    {
        return $this->belongsTo(Rol::class);
    }
    
    function aprendiz(){
        return $this->hasMany(Aprendiz::class);
    }

    function instructor(){
        return $this->hasMany(Instructor::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'idRolFK',
        'email', 
        'password',
        'estadoUsuario',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getPerfilModel($idUsuario){
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
