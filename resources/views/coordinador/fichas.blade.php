
@extends('menu.menuCoordinador')

@section('fichas')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Fichas</h4>
                    <div class="card-header-form">
                      <form action="{{route('coordiandor.getFichas')}}" method="get">
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
                                <td><a href="{{ url('/coordinador/proyectos/'.$fichas->idFicha) }}" class="btn btn-outline-primary">{{ $fichas->ficha }}</a></td>
                                <td>{{ $fichas->fechaInicio }}</td>
                                <td>{{ $fichas->fechaFin }}</td>
                                <td>{{ $fichas->nombrePrograma }}</td>
                                <td>{{ $fichas->idInstructor }}</td>
                                <td>{{ $fichas->nombreInstructor }} {{ $fichas->apellidoInstructor }}</td>
                                <td>{{ $fichas->documentoInstructor }}</td>
                                @if ($fichas->estadoFicha === 0)
                                  <td><a class="badge badge-danger">Inactivo</a></td>
					                      @elseif ($fichas->estadoFicha === 1)
                                  <td><a class="badge badge-success">Activa</a></td>
					                      @endif
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

@endsection