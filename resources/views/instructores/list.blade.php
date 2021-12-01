
@extends('menu.menuInstructor')

@section('evidencias')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evidencias</h4>
                  </div>
				  <div class="card-header">
                    <h4>Seleccione un trimestre</h4>
					@foreach ($result[0] as $evidencia)
	                <a type="button" class="btn btn-outline-primary mx-1" href="{{ url('/instructor/evidencias/trimestre/'.$evidencia->idFicha.'/'.$evidencia->trimestre) }}">{{ $evidencia->trimestre }}</a><br>
	                @endforeach
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
							  <th>Trimestre</th>
				              <th>Nombre</th>
				              <th>Fase</th>
				              <th>Fecha inicio</th>
				              <th>Fecha Fin</th>
				              <th>Evidencia link</th>
				              <th>Estado</th>
				              <th>Acción</th>
                        </thead>
                        <tbody>
                        @if(count($result[1])<=0)
                            <tr>
                              <td colspan="10" class="text-center">Vacío</td>
                            </tr>
                        @else
                          @foreach ($result[1] as $evidencia)
                          <tr>
                            <td>{{ $evidencia->trimestre }}</td>
						             	  <td>{{ $evidencia->nombreEvidencia }}</td>
							              <td>{{ $evidencia->faseEvidencia }}</td>
							              <td>{{ $evidencia->fechaInicio }}</td>
							              <td>{{ $evidencia->fechaFin }}</td>
                            <td><a href="{{ $evidencia->evidenciaP }}" class="btn btn-outline-primary" target="_blank">Ir a la evidencia</a></td>
                            @if ($evidencia->estadoEvidenciaFi === 0)
                              <td><a href="{{ url('/instructor/evidencias/activar/'.$evidencia->idEvidencia_ficha) }}" class="badge badge-danger">Activar</a></td>
					                  @elseif ($evidencia->estadoEvidenciaFi === 1)
                              <td><a href="{{ url('/instructor/evidencias/desactivar/'.$evidencia->idEvidencia_ficha) }}" class="badge badge-success">Desactivar</a></td>
					                  @endif
                            <td><a href="#" type="button" class="btn btn-primary btn-action mr-1" data-toggle="modal" title="Editar" data-target="#ModalEditarEvidencia{{ $evidencia->idEvidencia_ficha }}"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody> 
                      </table>
                      {{$result[1]->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </section>
        @include('instructores.editarEvidencia')
@endsection