
@extends('menu.menuAdmi')

@section('fichas')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <div style="width: 450px;">
                  <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCrearFicha">Crear Ficha</a><br/>
                  </div>
                  <h4>Fichas</h4>
                    <div class="card-header-form">
                      <form action="{{route('administrador.getFichas')}}" method="get">
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
                            <th>Nombre Ficha</th>
                            <th>Fecha Inicio de la ficha</th>
                            <th>Fecha Fin de la ficha</th>
                            <th>Programa</th>
                            <th>Id Instructor</th>
                            <th>Nombre Instructor</th>
                            <th>Documento Instructor</th>
                            <th>Estado Ficha</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if(count($result)<=0)
                            <tr>
                              <td colspan="10" class="text-center">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($result as $fichas) 
                            <tr>
                                <td>{{ $fichas->idFicha }}</td>
                                <td>{{ $fichas->ficha }}</td>
                                <td>{{ $fichas->fechaInicio }}</td>
                                <td>{{ $fichas->fechaFin }}</td>
                                <td>{{ $fichas->nombrePrograma }}</td>
                                <td>{{ $fichas->idInstructor }}</td>
                                <td>{{ $fichas->nombreInstructor }} {{ $fichas->apellidoInstructor }}</td>
                                <td>{{ $fichas->documentoInstructor }}</td>
                                @if ($fichas->estadoFicha === 1)
                                  <td><a href="{{ url('administrador/actualizarestadoinactivo/'.$fichas->estadoFicha.'/'.$fichas->idFicha) }}" class="badge badge-success">Activo</a></td>
                                @elseif ($fichas->estadoFicha === 0)
                                  <td><a href="{{ url('administrador/actualizarestadoactivo/'.$fichas->estadoFicha.'/'.$fichas->idFicha) }}" class="badge badge-danger">Inactivo</a></td>
                                @endif
                                <td><a href="#" type="button" class="btn btn-primary btn-action mr-1" data-toggle="modal" title="Editar" data-target="#ModalEditarFicha{{ $fichas->idFicha }}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAñadirAprendizFicha{{ $fichas->idFicha }}">AñadirAprendiz</a></td>
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
        @include('administrador.modal.crearFicha')
        @include('administrador.modal.editarFichas')
        @include('administrador.modal.añadirAprendicesFicha')

@endsection