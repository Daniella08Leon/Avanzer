
@extends('menu.menuAprendiz')

@section('evidenciasSubidas')
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evidencias del Proyecto</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Comentario</th>
                            <th>Fecha de Envio</th>
                            <th>Evidencia</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                        @if(count($result1)<=0)
                            <tr>
                              <td colspan="10" class="text-center">Vacío</td>
                            </tr>
                        @else
						            @foreach ($result1 as $evidencia)
                          <tr>
                            <td>{{ $evidencia->comentario }}</td>
                            <td>{{ $evidencia->fechaevidencia }}</td>
                            <td><a href="{{ $evidencia->evidenciaAprendiz }}" class="btn btn-outline-primary" target="_blank">Ver evidencia</a></td>
                            <td><a href="#" type="button" class="btn btn-primary btn-action mr-1" data-toggle="modal" title="Editar" data-target="#ModalEditarEvidencia{{ $evidencia->idEvidenciaAprendiz }}"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
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
@include('aprendiz.editarEvidencias')

@endsection