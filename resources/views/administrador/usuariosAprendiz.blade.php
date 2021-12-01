
@extends('menu.menuAdmi')

@section('usuariosA')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <div style="width: 450px;">
                  <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCrearAprendiz">Crear Aprendiz</a><br>
                  </div>
                    <h4>Usuarios Aprendiz</h4>
                    <div class="card-header-form">
                      <form action="{{route('administrador.getUsuariosAprendiz')}}" method="get">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar" name="texto" value="{{$texto}}">
                          <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Ficha</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                        @if(count($result)<=0)
                            <tr>
                              <td colspan="10" class="text-center">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($result as $usuario)
                            <tr>
                                <td>{{ $usuario->idUsuario }}</td> 
                                <td>{{ $usuario->ficha }}</td>
                                <td>{{ $usuario->nombreAprendiz }} {{ $usuario->apellidoAprendiz }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->documentoAprendiz }}</td>
                                @if ($usuario->estadoUsuario === 1)
                                  <td><a href="{{ url('administrador/actualizarInactivo/'.$usuario->estadoUsuario.'/'.$usuario->idUsuario) }}" class="badge badge-success">Activo</a></td> 
                                @elseif ($usuario->estadoUsuario === 0)
                                  <td><a href="{{ url('administrador/actualizarActivo/'.$usuario->estadoUsuario.'/'.$usuario->idUsuario) }}" class="badge badge-danger">Inactivo</a></td>
                                @endif
                                <td><a href="#" type="button" class="btn btn-primary btn-action mr-1" data-toggle="modal" title="Editar" data-target="#ModalEditarAprendiz{{ $usuario->idUsuario }}"><i class="fas fa-pencil-alt"></i></a></td>
                                @endforeach
                            </tr>
                            @endif
                        </tbody>
                      </table>
                      {{$result->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </section>
        @include('administrador.editarUsuarioA')
        @include('administrador.crearAprendiz')

@endsection