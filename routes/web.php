<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvidenciaController; 
use App\Http\Controllers\FichaController; 
use App\Http\Controllers\InstructorController; 
use App\Http\Controllers\ProyectosController; 
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AprendizProyectoController;
use App\Http\Controllers\EvidenciaAprendizController;
use App\Http\Controllers\AvanceController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EvidenciaFichaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//PRIMERAS RUTAS DE CADA ROL
Route::get('aprendiz/proyecto', [AprendizController::class, 'getProyecto']);

Route::get('instructor/ficha', [InstructorController::class, 'getFichas']);

Route::get('administrador/fichas', [AdministradorController::class, 'getFichas'])->name('administrador.getFichas');

Route::get('coordinador/fichas', [CoordinadorController::class, 'getFichas'])->name('coordiandor.getFichas');

//EVIDENCIA
Route::get('instructor/evidencias/{idFicha}', [EvidenciaController::class, 'getEvidencias']);

Route::get('instructor/evidencias/trimestre/{idFicha}/{trimestre}', [EvidenciaController::class, 'getEvidenciasConTrimestre']);

Route::get('instructor/evidencias/activar/{id}', [EvidenciaController::class, 'activarEvidencias']);

Route::get('instructor/evidencias/desactivar/{id}', [EvidenciaController::class, 'desactivarEvidencias']);

Route::get('aprendiz/evidencias/{idFichaFK}/{idAprendiz}', [EvidenciaController::class, 'getEvidenciasAprendiz']);

Route::get('evidencias/subir/{idEvidencia}/{idAprendiz}', [EvidenciaController::class, 'getverEvidencia']);

Route::post('evidencias/subir/{idEvidencia}/aprendiz/{idAprendiz}', [EvidenciaController::class, 'actualizarEvidencia']);

Route::get('instructor/proyecto/evidencias/{idProyecto}',[EvidenciaAprendizController::class, 'getEvidenciasProyecto']);

Route::get('evidencias/proyecto/{idAprendiz}',[EvidenciaAprendizController::class, 'getEvidenciasAprendizProyecto']);

Route::post('aprendiz/guardar/evidencias/{idEvidenciaAprendiz}', [EvidenciaAprendizController::class, 'guardarEvidencia']);

Route::get('administrador/lista/evidencias', [EvidenciaController::class, 'getEvidenciasAdmi'])->name('administrador.getEvidenciasAdmi');

Route::get('administrador/actualizarEvidActivo/{estadoEvidencia}/{idEvidencia}', [EvidenciaController::class, 'estadoActivar']);

Route::get('administrador/actualizarEvidInactivo/{estadoEvidencia}/{idEvidencia}', [EvidenciaController::class, 'estadoInhabilitar']);

Route::post('administrador/editar/evidencia/{idEvidencia}', [EvidenciaController::class, 'guardarEvidenciaAd']);

Route::post('crear/evidencia',[EvidenciaController::class, 'crearEvidencias']);

Route::get('administrador/lista/evidencias/fichas', [EvidenciaFichaController::class, 'getEvidenciasFichas'])->name('administrador.getEvidenciasFichas');

Route::post('administrador/borrar/evidencias/fichas/{idEvidencia_ficha}',[EvidenciaFichaController::class, 'eliminarEvidenciaFicha']);

Route::post('crear/evidencia/fichas',[EvidenciaFichaController::class, 'crearEvidenciasFichas']);

Route::post('instructor/editar/evidencia/{idEvidencia_ficha}', [EvidenciaFichaController::class, 'guardarEvidenciaFicha']);

Route::get('coordinador/proyecto/evidencias/{idProyecto}',[EvidenciaAprendizController::class, 'getEvidenciasProyectoCoord']);


//AVANCE

Route::get('instructor/avance/{idFichaFK}',[AvanceController::class, 'getEvidenciaAvance']);

Route::get('aprendiz/verAvances/{idProyecto}',[AvanceController::class, 'getAvancesAprendiz']);

Route::get('instructor/avance/{idFicha}/{idEvidenciaFK}', [AvanceController::class, 'getEvidenciasConEvidencias']);

Route::post('instructor/crearAvances/{idInstructorFK}', [AvanceController::class, 'crearAvance']);

Route::get('instructor/verAvances/{idFichaFK}', [AvanceController::class, 'getAvances']);   

Route::get('instructor/verAvancesFiltrados/{idFicha}/{idEvidenciaFK}', [AvanceController::class, 'getAvancesFiltrados']);

Route::post('instructor/editarAvances/{idAvance}', [AvanceController::class, 'cambiarAvance']);

Route::post('instructor/borrar/avance/{idAvance}',[AvanceController::class, 'eliminarAvance']);

Route::get('coordinador/verAvances/{idProyecto}', [AvanceController::class, 'getAvancesCoordinador']);



//PROYECTO 
Route::get('instructor/proyectos/{idFicha}', [FichaController::class, 'getVerProyectos']);

Route::get('instructor/crearProyectos/{idFicha}', [AprendizController::class, 'getAprendicesDeFicha']);

Route::post('actualizarProyecto/{idProyecto}', [ProyectosController::class, 'crearAprendizProyecto']);

Route::post('guardarProyecto/{idFicha}', [ProyectosController::class, 'crearProyecto']);

Route::get('instructor/proyecto/{idProyecto}', [AprendizController::class, 'getDetalleProyecto']); 

Route::post('aprendizP/borrar/{idAprendiz_proyectos}',[AprendizProyectoController::class, 'eliminarAprendizProyecto']);

Route::post('proyecto/desintegrar/{idProyecto}',[ProyectosController::class, 'desintegrarGrupo']);

Route::get('instructor/proyecto/{idFicha}/nuevo/{idProyecto}',[AprendizController::class, 'getAprendicesNuevos']);

Route::get('aprendiz/editar/{idProyecto}',[ProyectosController::class, 'gettraerProyectoEditar']);

Route::post('aprendiz/guardar/proyecto/{idProyecto}', [ProyectosController::class, 'guardarProyecto']);

Route::get('coordinador/proyectos/{idFicha}', [FichaController::class, 'getVerProyectosCoordinador']);

Route::get('coordinador/proyecto/{idProyecto}', [AprendizController::class, 'getDetalleProyectoCoord']); 


//FICHAS

Route::post('administrador/editar/ficha/{idFicha}', [FichaController::class, 'guardarFicha']);

Route::post('administrador/crear/ficha', [FichaController::class, 'crearFicha']);

Route::get('administrador/actualizarestadoactivo/{estadoFicha}/{idFicha}', [FichaController::class, 'guardarEstadoActivar']);

Route::get('administrador/actualizarestadoinactivo/{estadoFicha}/{idFicha}', [FichaController::class, 'guardarEstadoInhabilitar']);

Route::post('administrador/actualizar/aprendiz/ficha/{idFicha}', [FichaController::class, 'añadirAprendizFicha']);

//USUARIOS APRENDIZ

Route::get('administrador/usuarios/aprendiz', [AdministradorController::class, 'getUsuariosAprendiz'])->name('administrador.getUsuariosAprendiz');

Route::post('administrador/editar/aprendiz/{idAprendiz}/{idUsuarioFK}', [AprendizController::class, 'guardarAprendiz']);

Route::get('administrador/actualizarActivo/{estadoUsuario}/{idUsuario}', [UserController::class, 'guardarEstadoActivar']);

Route::get('administrador/actualizarInactivo/{estadoUsuario}/{idUsuario}', [UserController::class, 'guardarEstadoInhabilitar']);

Route::post('crear/aprendiz',[AprendizController::class, 'crearAprendices']);

Route::get('aprendiz/perfil', [UserController::class, 'getPerfilApren']);

Route::post('editar/perfil/aprendiz/{idUsuario}',[UserController::class, 'editarPerfilAn']);


//USUARIOS INSTRUCTOR

Route::get('administrador/usuarios/instructor', [AdministradorController::class, 'getUsuariosInstructor'])->name('administrador.getUsuariosInstructor');

Route::get('administrador/actualizarActivoI/{estadoUsuario}/{idUsuario}', [UserController::class, 'guardarEstadoActivarI']);

Route::get('administrador/actualizarInactivoI/{estadoUsuario}/{idUsuario}', [UserController::class, 'guardarEstadoInhabilitarI']);

Route::post('administrador/editar/Instructor/{idInstructor}/{idUsuarioFK}', [InstructorController::class, 'guardarInstructor']);

Route::post('crear/instructor',[InstructorController::class, 'crearInstructores']);

Route::get('instructor/perfil/{idFicha}', [UserController::class, 'getPerfilInst']);

Route::post('editar/perfil/instructor/{idUsuario}/{idFicha}',[UserController::class, 'editarPerfilIns']);


//USUARIOS COORDINADOR - ADMI

Route::get('administrador/usuarios/coordinador/administrador', [AdministradorController::class, 'getUsuariosAdmiCoord'])->name('administrador.getUsuariosAdmiCoord');

Route::get('administrador/actualizarActivoCA/{estadoUsuario}/{idUsuario}', [UserController::class, 'guardarEstadoActivarCA']);

Route::get('administrador/actualizarInactivoCA/{estadoUsuario}/{idUsuario}', [UserController::class, 'guardarEstadoInhabilitarCA']);

Route::post('administrador/editar/Usuario/{idUsuario}', [UserController::class, 'guardarUsuarios']);

Route::post('crear/Usuario',[UserController::class, 'crearUsuarios']);

Route::get('administrador/perfil', [UserController::class, 'getPerfil']);

Route::post('editar/perfil/{idUsuario}',[UserController::class, 'editarPerfilA']);

Route::get('coordinador/perfil', [UserController::class, 'getPerfilCoor']);

Route::post('editar/perfil/coordinador/{idUsuario}',[UserController::class, 'editarPerfilCoor']);

//PDF
Route::get('instructor/avances/PDF/{idEvidenciaFK}/{idFichaFK}', [AvanceController::class, 'getAvancesFiltradosPDF']);


//LOGIN
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


