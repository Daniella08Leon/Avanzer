<!--Inicio modal editar-->
@foreach ($result[0] as $proyecto)
        <div class="modal fade" id="ModalEditarProyecto{{ $result[0]->idProyecto }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Proyecto</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/aprendiz/guardar/proyecto/{{$result[0]->idProyecto}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="nombreProyecto">Nombre Proyecto</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreProyecto" name="nombreProyecto" value="{{@old('nombreProyecto') ? @old('nombreProyecto') : $result[0]->nombreProyecto}}">
                                </div>
                                @error('nombreProyecto')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div> 
                            <div class="form-group">
                                <label for="descripcionProyecto">Descripción</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="descripcionProyecto" name="descripcionProyecto" value="{{@old('descripcionProyecto') ? @old('descripcionProyecto') : $result[0]->descripcionProyecto}}">
                                </div>
                                @error('descripcionProyecto')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                            </div>
                          </div>
                          <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Guardar</button></form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
<!--Fin modal editar-->