<!--Inicio modal editar-->
<div class="modal fade" id="ModalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Crear Usuario</h5>
                          </div>
                          <div class="modal-body">
                             <form action="/crear/Usuario" method="post">
                             @csrf 
                             <div class="form-group">
                                <label for="idRolFK">Rol del Usuario</label>
                                <div class="input-group">
                                <select class="form-control" id="idRolFK" name="idRolFK">
                                    <option value="4">Coordinador</option>
                                    <option value="1">Administrador</option>
                                  </select>                                
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="email">Email Usuario</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                  <input type="hidden" class="form-control" id="password" name="password" value="avanzerUsuario">
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