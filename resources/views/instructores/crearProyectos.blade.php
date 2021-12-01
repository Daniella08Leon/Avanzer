
@extends('menu.menuInstructor')

@section('crearProyectos')
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Crear proyecto</h4>
                  </div>
                  <div class="card-body">
				  <form action="/guardarProyecto/{{$result[1]->idFicha}}" method="post">
				  @csrf 
                        <div class="form-group">
                            <label for="nombreProyecto">Nombre del Proyecto</label>
                            <input type="text" class="form-control" id="nombreProyecto" name="NombreProyecto" value="{{@old('NombreProyecto')}}" placeholder="Escriba el nombre del proyecto">
                            @error('nombreProyecto')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                          </div>
						              <div class="form-group">
                            <label for="descripcionProyecto">Descripción</label>
                            <input type="text" class="form-control" id="descripcionProyecto" name="Descripcion" value="{{@old('Descripcion')}}" placeholder="Descripcion del proyecto">
                            @error('descripcionProyecto')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                          </div>
						                 <div class="card-body">
                                <div class="form-group">
                                  <label for="ficha">Aprendices</label>
                                </div>
                                @if(count($result[0])<=0)
                                    <div class="form-group">
                                      <label class="text-center"><h4>No Hay Aprendices</h4></label>
                                    </div>
                                @else
                                @foreach ($result[0] as $aprendiz)
                                  <div class="pretty p-icon p-jelly p-round p-bigger">
                                  <input type="checkbox" id="{{ $aprendiz->nombreAprendiz }}" name="aprendiz[]" value="{{ $aprendiz->idAprendiz }}"/>
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
                            <button class="btn btn-primary mr-1" type="submit">Guardar</button></form>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                   </div>

                  </div>
               </div>

			  </div>
            </div>
            </div>
        </section>
@endsection
