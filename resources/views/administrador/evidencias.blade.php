
@extends('menu.menuAdmi')

@section('evidencias')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <div style="width: 450px;">
                  <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCrearEvidencia">Crear Evidencia</a><br>
                  </div>
                    <h4>Evidencias</h4>
                    <div class="card-header-form">
                      <form action="{{route('administrador.getEvidenciasAdmi')}}" method="get">
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
                            <th>trimestre</th>
                            <th>Nombre</th>
                            <th>Fase</th>
                            <th>Link</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                        @if(count($result)<=0)
                            <tr>
                              <td colspan="10" class="text-center">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($result as $evi)
                            <tr>
                                <td>{{ $evi->idEvidencia }}</td>
                                <td>{{ $evi->trimestre }}</td>
                                <td>{{ $evi->nombreEvidencia }}</td>
                                <td>{{ $evi->faseEvidencia }}</td>
                                <td><a href="{{ $evi->evidenciaP }}" class="btn btn-outline-primary" target="_blank">Evidencia</a></td>
                                @if ($evi->estadoEvidencia === 1)
                                  <td><a href="{{ url('administrador/actualizarEvidInactivo/'.$evi->estadoEvidencia.'/'.$evi->idEvidencia) }}" class="badge badge-success">Activo</a></td> 
                                @elseif ($evi->estadoEvidencia === 0)
                                  <td><a href="{{ url('administrador/actualizarEvidActivo/'.$evi->estadoEvidencia.'/'.$evi->idEvidencia) }}" class="badge badge-danger">Inactivo</a></td>
                                @endif
                                <td><a href="#" type="button" class="btn btn-primary btn-action mr-1" data-toggle="modal" title="Editar" data-target="#ModalEditarEvidencia{{ $evi->idEvidencia }}"><i class="fas fa-pencil-alt"></i></a></td>
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
        @include('administrador.editarEvidencia')
        @include('administrador.crearEviden')

@endsection