<!--Inicio modal editar-->
@foreach ($result[1] as $evidencia)
        <div class="modal fade" id="ModalEditarEvidencia{{ $evidencia->idEvidencia_ficha }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Evidencia</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/instructor/editar/evidencia/{{$evidencia->idEvidencia_ficha}}" method="post">
                            @csrf 
                              <div class="form-group">
                                <label for="nombreEvidencia">Nombre Evidencia</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreEvidencia" name="nombreEvidencia" value="{{@old('nombreEvidencia') ? @old('nombreEvidencia') : $evidencia->nombreEvidencia}}" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="fechaInicio">Fecha Inicio de la Evidencia</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{@old('fechaInicio') ? @old('fechaInicio') : $evidencia->fechaInicio}}">
                                </div>
                                @error('fechaInicio')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="fechaFin">Fecha Fin de la Evidencia</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="{{@old('fechaFin') ? @old('fechaFin') : $evidencia->fechaFin}}">
                                </div>
                                @error('fechaFin')
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