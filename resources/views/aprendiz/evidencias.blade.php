
@extends('menu.menuAprendiz')

@section('evidencia')
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evidencias</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
							  <th>Nombre</th>
                              <th>Fase</th>
                              <th>Fecha Inicio</th>
                              <th>Fecha Fin</th>
                              <th>Subir</th>
                        </thead>
                        <tbody>
						@foreach ($result1 as $evidencia)
                          <tr>
							  <td>{{ $evidencia->nombreEvidencia }}</td>
                              <td>{{ $evidencia->faseEvidencia }}</td>
                              <td>{{ $evidencia->fechaInicio }}</td>
                              <td>{{ $evidencia->fechaFin }}</td>
                              <td><a class="btn btn-outline-primary" href="#" type="button" data-toggle="modal" data-target="#ModalSubirEvidencia{{ $evidencia->idEvidencia }}{{ $evidencia->idAprendiz }}">Subir Evidencia</a></td>
                         </tr>
                        @endforeach
                        </tbody>
                      </table>
					  {{$result1->links()}}
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>
</section>
@include('aprendiz.subirEvidencia')

@endsection