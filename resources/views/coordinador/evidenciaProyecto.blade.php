
@extends('menu.menuCoordinador')

@section('evidenciasProyecto')
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Observaciónes del Proyecto</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Evidencia</th>
				                    <th>Comentario de la Evidencia</th>
				                    <th>Fecha envio Evidencia</th>
				                    <th>Avance</th>
				                    <th>Fecha Avance</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(count($result1)<=0)
                            <tr>
                              <td colspan="10" class="text-center">Vacío</td>
                            </tr>
                        @else
                          @foreach ($result1 as $avances)
                          <tr>
                            <td><a href="{{ $avances->evidenciaAprendiz }}" class="btn btn-outline-primary" target="_blank">Evidencia</a></td>
                            <td>{{ $avances->comentario }}</td>
                            <td>{{ $avances->fechaevidencia }}</td>
                            <td>{{ $avances->avance }}</td>
                            <td>{{ $avances->fechaAvance }}</td>
                          </tr>
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>
</section>
@endsection