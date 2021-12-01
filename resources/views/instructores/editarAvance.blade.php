<!--Inicio modal editar-->
@foreach ($result[1] as $avances)
        <div class="modal fade" id="ModalEditarAvance{{ $avances->idAvance }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Avance</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/instructor/editarAvances/{{$avances->idAvance}}}" method="post">
                            @csrf 
                              <div class="form-group">
                                <label for="avance">Avance</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="avance" name="avance" value="{{@old('avance') ? @old('avance') : $avances->avance}}">
                                </div>
                              @error('avance')
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