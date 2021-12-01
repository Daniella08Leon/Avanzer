<!--Inicio modal editar-->
@foreach ($result as $fichas)
        <div class="modal fade" id="ModalAñadireviden" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Crear Evidencias Para Las Fichas</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/crear/evidencia/fichas" method="post">
                            @csrf 
                              <div class="form-group">
                                <label for="idFichaFK">Ficha</label>
                                <div class="input-group">
                                <select class="form-control" id="idFichaFK" name="idFichaFK">
                                <option value="#">Seleccione una Ficha</option>
                                @foreach ($ficha as $fic)
                                    <option value="{{ $fic->idFicha }}">{{ $fic->ficha }}</option>
                                @endforeach
                                  </select>                                
                                </div>
                                @error('idFichaFK')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="idEvidencia">Evidencias</label>
                                </div>
                                @foreach ($evidencia as $evid)
                                  <div class="pretty p-icon p-jelly p-round p-bigger">
                                  <input type="checkbox" id="{{ $evid->nombreEvidencia }}" name="evidencia[]" value="{{ $evid->idEvidencia }}"/>
                                    <div class="state p-info">
                                      <i class="icon material-icons">done</i>
                                      <label for="{{ $evid->nombreEvidencia }}">{{ $evid->nombreEvidencia }}, <strong>Fase:</strong> {{ $evid->faseEvidencia }}</label>
                                    </div>
                                  </div><br/>
                                @endforeach
                                @error('evidencia')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                               </div>
                               <div class="form-group">
                                <label for="fechaInicio">Fecha Inicio de la Evidencia</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{old('fechaInicio')}}">
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
                                  <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="{{old('fechaFin')}}">
                                </div>
                                @error('fechaFin')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
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