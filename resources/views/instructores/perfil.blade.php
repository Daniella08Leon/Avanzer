@extends('menu.menuInstructor')
@section('perfil')
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
                            <label for="nombreInstructor">Nombres</label>
                            <input type="text" class="form-control" id="nombreInstructor" name="nombreInstructor" value="{{ $result->nombreInstructor }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellidoInstructor">Apellidos</label>
                            <input type="text" class="form-control" id="apellidoInstructor" name="apellidoInstructor" value="{{ $result->apellidoInstructor }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="documentoInstructor">Documento</label>
                            <input type="text" class="form-control" id="documentoInstructor" name="documentoInstructor" value="{{ $result->documentoInstructor }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $result->email }}" required readonly>
                        </div>
                        <div class="card-footer text-right">
                           <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  title="Editar" data-target="#ModalEditarPerfil{{$result->idUsuario}}"><i class="fas fa-pencil-alt"></i>Cambiar Contraseña</a>
                        </div>
                   </div>
                  </div>
               </div>

			  </div>
            </div>
            </div>
        </section>
        @include('instructores.cambiarContraseña')
@endsection