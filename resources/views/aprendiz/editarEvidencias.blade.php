<!--Inicio modal editar-->
@foreach ($result1 as $evidencia)
        <div class="modal fade" id="ModalEditarEvidencia{{ $evidencia->idEvidenciaAprendiz }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Evidencia</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/aprendiz/guardar/evidencias/{{$evidencia->idEvidenciaAprendiz}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="evidenciaAprendiz">Evidencia Link</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="evidenciaAprendiz" name="evidenciaAprendiz" value="{{@old('evidenciaAprendiz') ? @old('evidenciaAprendiz') : $evidencia->evidenciaAprendiz}}">
                                </div>
                                @error('evidenciaAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                            <div class="form-group">
                                <label for="comentario">Comentario</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="comentario" name="comentario" value="{{@old('comentario') ? @old('comentario') : $evidencia->comentario}}">
                                </div>
                                @error('comentario')
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