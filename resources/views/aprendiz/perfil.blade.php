@extends('menu.menuAprendiz')
@section('perfil')
@foreach ($result as $perfil)
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Perfil</h4>
                  </div>
                  <div class="card-body">
                        <div class="form-group">
                            <label for="nombreAprendiz">Nombres</label>
                            <input type="text" class="form-control" id="nombreAprendiz" name="nombreAprendiz" value="{{ $perfil->nombreAprendiz }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellidoAprendiz">Apellidos</label>
                            <input type="text" class="form-control" id="apellidoAprendiz" name="apellidoAprendiz" value="{{ $perfil->apellidoAprendiz }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="documentoAprendiz">Documento</label>
                            <input type="text" class="form-control" id="documentoAprendiz" name="documentoAprendiz" value="{{ $perfil->documentoAprendiz }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $perfil->email }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombreProyecto">Proyecto</label>
                            <input type="text" class="form-control" id="nombreProyecto" name="nombreProyecto" value="{{ $perfil->nombreProyecto }}" required readonly>
                        </div>
                        <div class="card-footer text-right">
                           <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  title="Editar" data-target="#ModalEditarPerfil{{$perfil->idUsuario}}"><i class="fas fa-pencil-alt"></i>Cambiar Contraseña</a>
                        </div>
                   </div>
                  </div>
               </div>

			  </div>
            </div>
            </div>
        </section>
@endforeach
@include('aprendiz.cambiarContraseña')

@endsection