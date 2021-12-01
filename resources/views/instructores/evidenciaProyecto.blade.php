
@extends('menu.menuInstructor')

@section('evidenciasProyecto')
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
							  <th>Evidencia</th>
				              <th>Comentario</th>
				              <th>Fecha de Envio</th>
                        </thead>
                        <tbody>
                        @if(count($result)<=0)
                            <tr>
                              <td colspan="10" class="text-center">Vacío</td>
                            </tr>
                        @else
                          @foreach ($result as $evidencia)
                          <tr>
                            <td><a href="{{ $evidencia->evidenciaAprendiz }}" class="btn btn-outline-primary" target="_blank">Ver evidencia</a></td>
                            <td>{{ $evidencia->comentario }}</td>
                            <td>{{ $evidencia->fechaevidencia }}</td>
                        </tr>
                        @endforeach
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