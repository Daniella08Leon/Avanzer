<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;
use App\Models\Programa;
use App\Models\Ficha;
use App\Models\Proyecto;
use App\Models\Evidencia;
use App\Models\Evidencia_ficha;
use App\Models\Instructor;
use App\Models\Aprendiz;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1=Rol::create([
            'idRol' => '1',
            'NombreRol' => 'Administrador',
            ]);

        $rol2=Rol::create([
            'idRol' => '2',
            'NombreRol' => 'Instructor',
            ]);
       
        $rol3=Rol::create([
            'idRol' => '3',
            'NombreRol' => 'Aprendiz',
            ]);
        
        $rol4=Rol::create([
            'idRol' => '4',
            'NombreRol' => 'Coordinador',
            ]);

        $useradmin=User::create([
            'idRolFK' => '1',
            'email' => 'daniellaleon2003@gmail.com',
            'password' => Hash::make('leon'),
            'estadoUsuario' => '1',
            ]);

        $user1=User::create([
            'idRolFK' => '2',
            'email' => 'CarolinaForero@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user2=User::create([
            'idRolFK' => '2',
            'email' => 'MiguelArdila@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user3=User::create([
            'idRolFK' => '3',
            'email' => 'MariaGarcia@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user4=User::create([
            'idRolFK' => '3',
            'email' => 'AndresGonzales@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user5=User::create([
            'idRolFK' => '3',
            'email' => 'AntonioRamirez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user6=User::create([
            'idRolFK' => '3',
            'email' => 'CristinaLopez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user7=User::create([
            'idRolFK' => '3',
            'email' => 'PedroRamirez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user8=User::create([
            'idRolFK' => '3',
            'email' => 'LuzMarina@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user9=User::create([
            'idRolFK' => '3',
            'email' => 'LuciaLeon@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user10=User::create([
            'idRolFK' => '3',
            'email' => 'JoseMartinez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user11=User::create([
            'idRolFK' => '3',
            'email' => 'CristianMesa@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user12=User::create([
            'idRolFK' => '3',
            'email' => 'ErikaEspitia@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user13=User::create([
            'idRolFK' => '3',
            'email' => 'YinethVelarda@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user14=User::create([
            'idRolFK' => '3',
            'email' => 'PanchoMesa@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user15=User::create([
            'idRolFK' => '3',
            'email' => 'MarlonVera@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user16=User::create([
            'idRolFK' => '3',
            'email' => 'CarlosRamirez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user17=User::create([
            'idRolFK' => '3',
            'email' => 'JohanaSanchez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $user18=User::create([
            'idRolFK' => '4',
            'email' => 'JoseMurcia@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);
        
        $user19=User::create([
            'idRolFK' => '4',
            'email' => 'AndreaPaez@gmail.com',
            'password' => Hash::make('12345'),
            'estadoUsuario' => '1',
            ]);

        $instructor1=Instructor::create([
            'idUsuarioFK' => '2',
            'nombreInstructor' => 'Carolina',
            'apellidoInstructor' => 'Forero',
            'documentoInstructor' => '22435123',
            ]);

        $instructor2=Instructor::create([
            'idUsuarioFK' => '3',
            'nombreInstructor' => 'Miguel',
            'apellidoInstructor' => 'Ardila',
            'documentoInstructor' => '224532333',
            ]);

        $programa=Programa::create([
            'nombrePrograma' => 'ADSI',
            'versionPrograma' => '1',
            ]);

        $ficha1=Ficha::create([
            'idProgramaFK' => '1',
            'idInstructorFK' => '1',
            'ficha' => '1111111',
            'fechaInicio' => '2021-08-01',
            'fechaFin' => '2021-08-27',
            'estadoFicha' => '1',
            ]);
        $ficha2=Ficha::create([
            'idProgramaFK' => '1',
            'idInstructorFK' => '1',
            'ficha' => '22222222',
            'fechaInicio' => '2021-08-01',
            'fechaFin' => '2021-08-27',
            'estadoFicha' => '1',
            ]);
        $ficha3=Ficha::create([
            'idProgramaFK' => '1',
            'idInstructorFK' => '2',
            'ficha' => '3333333333',
            'fechaInicio' => '2021-08-01',
            'fechaFin' => '2021-08-27',
            'estadoFicha' => '1',
            ]);
        $ficha4=Ficha::create([
            'idProgramaFK' => '1',
            'idInstructorFK' => '2',
            'ficha' => '444444444',
            'fechaInicio' => '2021-08-01',
            'fechaFin' => '2021-08-27',
            'estadoFicha' => '1',
            ]);

        $proyecto1=Proyecto::create([
            'idFichaFK' => '1',
            'nombreProyecto' => 'Avanzer',
            'descripcionProyecto' => 'Seguimiento a proyectos',
            'estadoProyecto' => '1',
            ]);

        $proyecto1=Proyecto::create([
            'idFichaFK' => '1',
            'nombreProyecto' => 'JudiCitas',
            'descripcionProyecto' => 'Bufet abogados',
            'estadoProyecto' => '1',
            ]);

        $proyecto1=Proyecto::create([
            'idFichaFK' => '1',
            'nombreProyecto' => '333333',
            'descripcionProyecto' => '....',
            'estadoProyecto' => '1',
            ]);

        $proyecto1=Proyecto::create([
            'idFichaFK' => '2',
            'nombreProyecto' => '11111',
            'descripcionProyecto' => '....',
            'estadoProyecto' => '1',
            ]);

        $proyecto1=Proyecto::create([
            'idFichaFK' => '3',
            'nombreProyecto' => '22222',
            'descripcionProyecto' => '....',
            'estadoProyecto' => '1',
            ]);

        $proyecto1=Proyecto::create([
            'idFichaFK' => '4',
            'nombreProyecto' => '333333',
            'descripcionProyecto' => '.....',
            'estadoProyecto' => '1',
            ]);

        $evidencia1=Evidencia::create([
            'trimestre' => '2',
            'nombreEvidencia' => 'BD',
            'faseEvidencia' => 'Planeación',
            'evidenciaP' => 'https://www.google.com/webhp?hl=es-419&sa=X&ved=0ahUKEwjkzqaIy-vyAhX7RTABHWMQD14QPAgI',
            'estadoEvidencia' => '0',
            ]);

        $evidencia2=Evidencia::create([
            'trimestre' => '2',
            'nombreEvidencia' => 'Vistas',
            'faseEvidencia' => 'Planeación',
            'evidenciaP' => 'https://www.google.com/webhp?hl=es-419&sa=X&ved=0ahUKEwjkzqaIy-vyAhX7RTABHWMQD14QPAgI',
            'estadoEvidencia' => '0',
            ]);
        
        $evidencia3=Evidencia::create([
            'trimestre' => '3',
            'nombreEvidencia' => 'CRUD',
            'faseEvidencia' => 'Desarrollo',
            'evidenciaP' => 'https://www.google.com/webhp?hl=es-419&sa=X&ved=0ahUKEwjkzqaIy-vyAhX7RTABHWMQD14QPAgI',
            'estadoEvidencia' => '0',
            ]);

        $evidencia4=Evidencia::create([
            'trimestre' => '3',
            'nombreEvidencia' => 'Vistas',
            'faseEvidencia' => 'Desarrollo',
            'evidenciaP' => 'https://www.google.com/webhp?hl=es-419&sa=X&ved=0ahUKEwjkzqaIy-vyAhX7RTABHWMQD14QPAgI',
            'estadoEvidencia' => '0',
            ]);

        $evidenciaficha1=Evidencia_ficha::create([
            'idFichaFK' => '1',
            'idEvidenciaFK' => '1',
            'estadoEvidenciaFi' => '0',
            'fechaInicio' => '2021-10-01',
            'fechaFin' => '2021-10-30',
            ]);
        
        $evidenciaficha2=Evidencia_ficha::create([
            'idFichaFK' => '1',
            'idEvidenciaFK' => '2',
            'estadoEvidenciaFi' => '0',
            'fechaInicio' => '2021-10-01',
            'fechaFin' => '2021-10-30',
            ]);
        $evidenciaficha3=Evidencia_ficha::create([
            'idFichaFK' => '1',
            'idEvidenciaFK' => '3',
            'estadoEvidenciaFi' => '0',
            'fechaInicio' => '2021-10-01',
            'fechaFin' => '2021-10-30',
            ]);
        $evidenciaficha4=Evidencia_ficha::create([
            'idFichaFK' => '1',
            'idEvidenciaFK' => '4',
            'estadoEvidenciaFi' => '0',
            'fechaInicio' => '2021-10-01',
            'fechaFin' => '2021-10-30',
            ]);

        
        $aprendiz1=Aprendiz::create([
            'idUsuarioFK' => '4',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Maria',
            'apellidoAprendiz' => 'Garcia',
            'documentoAprendiz' => '123456',
            ]);

        $aprendiz2=Aprendiz::create([
            'idUsuarioFK' => '5',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Andres',
            'apellidoAprendiz' => 'Gonzales',
            'documentoAprendiz' => '23456234',
            ]);

        $aprendiz3=Aprendiz::create([
            'idUsuarioFK' => '6',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Antonio',
            'apellidoAprendiz' => 'Ramirez',
            'documentoAprendiz' => '34561233',
            ]);

        $aprendiz4=Aprendiz::create([
            'idUsuarioFK' => '7',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Cristina',
            'apellidoAprendiz' => 'Lopez',
            'documentoAprendiz' => '456322',
            ]);

        $aprendiz5=Aprendiz::create([
            'idUsuarioFK' => '8',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Pedro',
            'apellidoAprendiz' => 'Ramirez',
            'documentoAprendiz' => '56123333',
            ]);

        $aprendiz6=Aprendiz::create([
            'idUsuarioFK' => '9',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Luz',
            'apellidoAprendiz' => 'Marina',
            'documentoAprendiz' => '61234567',
        ]);

        $aprendiz7=Aprendiz::create([
            'idUsuarioFK' => '10',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Lucia',
            'apellidoAprendiz' => 'Leon',
            'documentoAprendiz' => '71234565',
            ]);

        $aprendiz8=Aprendiz::create([
            'idUsuarioFK' => '11',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Jose',
            'apellidoAprendiz' => 'Martinez',
            'documentoAprendiz' => '85643722',
            ]);

        $aprendiz9=Aprendiz::create([
            'idUsuarioFK' => '12',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Cristian',
            'apellidoAprendiz' => 'Mesa',
            'documentoAprendiz' => '9213255',
            ]);

        $aprendiz10=Aprendiz::create([
            'idUsuarioFK' => '13',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Erika',
            'apellidoAprendiz' => 'Espitia',
            'documentoAprendiz' => '0325577',
            ]);

        $aprendiz11=Aprendiz::create([
            'idUsuarioFK' => '14',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Yineth',
            'apellidoAprendiz' => 'Velarda',
            'documentoAprendiz' => '16555324',
            ]);

        $aprendiz12=Aprendiz::create([
            'idUsuarioFK' => '15',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Pancho',
            'apellidoAprendiz' => 'Mesa',
            'documentoAprendiz' => '2222421',
            ]);

        $aprendiz13=Aprendiz::create([
            'idUsuarioFK' => '16',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Marlon',
            'apellidoAprendiz' => 'Vera',
            'documentoAprendiz' => '3442344',
            ]);

        $aprendiz14=Aprendiz::create([
            'idUsuarioFK' => '17',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Carlos',
            'apellidoAprendiz' => 'Ramirez',
            'documentoAprendiz' => '455556243',
            ]);

        $aprendiz15=Aprendiz::create([
            'idUsuarioFK' => '18',
            'idFichaFK' => '1',
            'nombreAprendiz' => 'Johana',
            'apellidoAprendiz' => 'Sanchez',
            'documentoAprendiz' => '63456543',
            ]);
    }
}
