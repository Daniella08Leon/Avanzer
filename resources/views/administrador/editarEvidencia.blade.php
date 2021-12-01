<!--Inicio modal editar-->
@foreach ($result as $evi)
        <div class="modal fade" id="ModalEditarEvidencia{{ $evi->idEvidencia }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Evidencia</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/administrador/editar/evidencia/{{$evi->idEvidencia}}" method="post">
                            @csrf 
                             <div class="form-group">
                                <label for="trimestre">Trimestre</label>
                                <div class="input-group">
                                <select class="form-control" id="trimestre" name="trimestre">
                                    <option value="{{ $evi->trimestre}}">{{ $evi->trimestre }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option> 
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                  </select>
                                </div>
                                @error('trimestre')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                             </div>
                              <div class="form-group">
                                <label for="nombreEvidencia">Nombre Evidencia</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreEvidencia" name="nombreEvidencia" value="{{@old('nombreEvidencia') ? @old('nombreEvidencia') : $evi->nombreEvidencia}}">
                                </div>
                                @error('nombreEvidencia')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="faseEvidencia">Fase Evidencia</label>
                                <div class="input-group">
                                  <select class="form-control" id="faseEvidencia" name="faseEvidencia">
                                    <option value="{{ $evi->faseEvidencia}}">{{ $evi->faseEvidencia }}</option>
                                    <option value="Planeación">Planeación</option>
                                    <option value="Desarrollo">Desarrollo </option>
                                    <option value="Implementación">Implementación</option>
                                  </select>                                
                                </div>
                                @error('faseEvidencia')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="evidenciaP">Link</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="evidenciaP" name="evidenciaP" value="{{@old('evidenciaP') ? @old('evidenciaP') : $evi->evidenciaP}}">
                                </div>
                                @error('evidenciaP')
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