
@extends('menu.menuInstructor')

@section('crearAvances')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Crear Avance</h4>
                  </div>
				  <div class="card-header">
                    <h4>Seleccione una evidencia</h4>
					@foreach ($result[0] as $evidencia)
	                <a type="button" class="btn btn-outline-primary mx-1" href="{{ url('/instructor/avance/'.$evidencia->idFicha.'/'.$evidencia->idEvidenciaFK) }}">{{ $evidencia->nombreEvidencia }}</a><br>
	                @endforeach
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
					@foreach ($result[1] as $avance)
					<form action="/instructor/crearAvances/{{$avance->idInstructorFK}}"  class="ficha" method="post">
	                @endforeach
					@csrf 
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
						    <th>Proyecto</th>
				            <th>Evidencia</th>
				            <th>Avance</th>
                        </thead>
                        <tbody>
                        @if(count($result[1])<=0)
                            <tr>
                              <td colspan="10" class="text-center">Vacío</td>
                            </tr>
                        @else
						                  @foreach ($result[1] as $avance)
						                    <tr>
                                        <td><label for="{{ $avance->nombreProyecto }}" class="form-label">{{ $avance->nombreProyecto }}</label></td>
                                  <input type="hidden" class="form-input" id="{{ $avance->evidenciaAprendiz }}" name="proyecto[]" value="{{ $avance->idProyectoFK }}">
                                        <td>
                                            <a href="{{ $avance->evidenciaAprendiz }}" class="btn btn-outline-primary" target="_blank">Ver evidencia</a>
                                  <input type="hidden" class="form-input" id="{{ $avance->evidenciaAprendiz }}" name="evidencia[]" value="{{ $avance->idEvidenciaAprendiz }}">
                              </td>
                          <td>
							              <div class="form-group"><br/>
								                <div class="form-group">
                                    <textarea class="form-control" type="text" id="avance" name="avances[]" value=""></textarea>
                                </div>
                                @error('avances')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror 
                            </div>
							</td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody> 
                      </table>
					  <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-0">
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                      </div>
					  </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </section>
@endsection
