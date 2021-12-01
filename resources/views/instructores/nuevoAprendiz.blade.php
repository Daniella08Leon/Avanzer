
@extends('menu.menuInstructor')

@section('proyectoInd')
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Añadir Aprendiz</h4>
                  </div>
                  <div class="card-body">
				  <form action="/actualizarProyecto/{{$result[1]->idProyecto}}" method="post">
				  @csrf 
						<div class="card-body">
                                <div class="form-group">
                                  <label for="ficha">Aprendices</label>
                                </div>
                                @if(count($result[0])<=0)
                                    <div class="form-group">
                                      <label class="text-center"><h4>No Hay Aprendices </h4></label>
                                    </div>
                                @else
                                @foreach ($result[0] as $aprendiz)
                                  <div class="pretty p-icon p-jelly p-round p-bigger">
                                  <input type="checkbox" class="form-input" id="{{ $aprendiz->nombreAprendiz }}" name="aprendiz[]" value="{{ $aprendiz->idAprendiz }}"/>
                                    <div class="state p-info">
                                      <i class="icon material-icons">done</i>
                                      <label for="{{ $aprendiz->nombreAprendiz }}">{{ $aprendiz->nombreAprendiz }}</label>
                                    </div>
                                  </div><br/>
                                @endforeach
                                @endif
                                @error('aprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Añadir a Proyecto</button></form>
                        </div>
                   </div>
                  </div>
               </div>

			  </div>
            </div>
            </div>
        </section>
@endsection
