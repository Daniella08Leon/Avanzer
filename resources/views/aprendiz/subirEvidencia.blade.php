<!--Inicio modal editar-->
@foreach ($result1 as $evidencia)
<div class="modal fade" id="ModalSubirEvidencia{{ $evidencia->idEvidencia }}{{ $evidencia->idAprendiz }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Subir Evidencia</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/evidencias/subir/{{ $evidencia->idEvidencia }}/aprendiz/{{ $evidencia->idAprendiz }}" method="post">
                            @csrf 
							              <div class="form-group"><br/>
							                    <label for="evidenciaAprendiz">Evidencia Link</label>
								                  <div class="form-group">
                                    <textarea class="form-control" type="text" id="evidenciaAprendiz" name="evidenciaAprendiz" value="{{@old('evidenciaAprendiz')}}" ></textarea>
                                </div>
                                @error('evidenciaAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                            </div>
							                  <div class="form-group"><br/>
							                  <label for="comentario">Comentario</label>
								                <div class="form-group">
                                    <textarea class="form-control" type="text" id="comentario" name="comentario" value="{{@old('comentario')}}"></textarea>
                                      <input type="hidden" class="form-control" id="idEvidencia" name="idEvidencia" value="{{$evidencia->idEvidencia}}" readonly>
                                      <input type="hidden" class="form-control" id="idAprendiz" name="idAprendiz" value="{{$evidencia->idAprendiz}}" readonly>
                                </div>
                                @error('comentario')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                            </div>
                          </div>
                          <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Crear</button></form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach

<!--Fin modal editar-->