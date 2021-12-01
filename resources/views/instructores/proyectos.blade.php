
@extends('menu.menuInstructor')

@section('proyecto')
<section class="section">
<div class="section-body">
<div class="row">
@foreach ($result as $proyec)
<div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-muted mb-0">{{ $proyec->nombreProyecto }}</h6>
                        <span class="font-weight-bold mb-0">{{ $proyec->descripcionProyecto }}</span>
                      </div>
                      <div class="col-auto">
					  <a href="{{ url('instructor/proyecto/'.$proyec->idProyecto) }}">
                        <div class="card-circle l-bg-orange text-white">
                          <i class="fas fa-book-open"></i>
                        </div>
						</a>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
					@if ($proyec->estadoProyecto === 1)
                      <span class="text-nowrap">Activo</span>
					@elseif ($usuario->estadoUsuario === 0)
					<span class="text-nowrap">Acabado</span>
					@endif
                    </p>
                  </div>
                </div>
              </div>  
			@endforeach    
</div>
</div>
</section>
@endsection