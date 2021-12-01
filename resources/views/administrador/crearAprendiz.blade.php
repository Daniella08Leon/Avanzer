<!--Inicio modal editar-->
<div class="modal fade" id="ModalCrearAprendiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Crear Aprendiz</h5>
                          </div>
                          <div class="modal-body">
                             <form action="/crear/aprendiz" method="post">
                             @csrf 
                              <div class="form-group">
                                <label for="nombreAprendiz">Nombres Aprendiz</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreAprendiz" name="nombreAprendiz" value="{{old('nombreAprendiz')}}">
                                </div>
                              @error('nombreAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="apellidoAprendiz">Apellidos Aprendiz</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="apellidoAprendiz" name="apellidoAprendiz" value="{{old('apellidoAprendiz')}}">
                                </div>
                              @error('apellidoAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="documentoAprendiz">Documento Aprendiz</label>
                                <div class="input-group">
                                  <input type="number" class="form-control" id="documentoAprendiz" name="documentoAprendiz" value="{{old('documentoAprendiz')}}">
                                </div>
                              @error('documentoAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="email">Email Aprendiz</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                  <input type="hidden" class="form-control" id="password" name="password" value="avanzeraprendiz">
                                </div>
                              @error('email')
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
<!--Fin modal editar-->