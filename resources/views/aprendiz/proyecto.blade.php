
@extends('menu.menuAprendiz')

@section('proyecto')
<section class="section">
<div class="section-body">
<div class="row">
             <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ $result[0]->nombreProyecto }} - {{ $result[0]->descripcionProyecto }}</</h4>
					<a href="#"type="button"  class="btn btn-icon btn-sm btn-primary" data-toggle="modal" title="Editar" data-target="#ModalEditarProyecto{{ $result[0]->idProyecto }}"><i class="fas fa-pencil-alt"></i></a>                  
				  </div>
                </div>
              </div>

			  @foreach ($compañeros as $proyec)
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">{{ $proyec->nombreAprendiz }} {{ $proyec->apellidoAprendiz }}</h6>
                        <span class="font-weight-bold mb-0 font-12">Documento: {{ $proyec->documentoAprendiz }}</span>
                      </div>
                      <i class="fas fa-user card-icon col-orange font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart1" height="2"></canvas>
                  </div>
                </div>
              </div>
			  @endforeach
</div>
</div>
</section>
@include('aprendiz.editarProyecto')
@endsection