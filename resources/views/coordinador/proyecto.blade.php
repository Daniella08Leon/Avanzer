
@extends('menu.menuCoordinador')

@section('proyectoInd')
<section class="section">
<div class="section-body">
<div class="row">

<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ $result[1]->nombreProyecto }}- {{ $result[1]->descripcionProyecto }}</h4>
                    <a type="button" class="btn btn-primary m-3" href="{{ url('coordinador/verAvances/'.$result[1]->idProyecto) }}">Evidencias Proyecto</a><br/>
				          </div>
                </div>
              </div>

					           @foreach ($result[0] as $proyec)
             <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">{{ $proyec->nombreAprendiz }} {{ $proyec->apellidoAprendiz }}<h6>
                      </div>
                      <i class="fas fa-user card-icon col-orange font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart1" height="2"></canvas>
                  </div>
                </div>
              </div>
					          @endforeach
                    </ul>
                  </div>
                </div>
              </div>

</div>
</div>
</section>
@endsection