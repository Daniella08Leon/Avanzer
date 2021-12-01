<!--Inicio modal editar-->
@foreach ($result as $perfil)
        <div class="modal fade" id="ModalEditarPerfil{{$perfil->idUsuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Cambiar Contraseña</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/editar/perfil/coordinador/{{$perfil->idUsuario}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="password">Escriba su nueva Contraseña</label>
                                <div class="input-group">
                                  <input type="password" class="form-control" id="password" name="password" value="" >
                                </div>
                                @error('password')
                                <br>
                                <small>-- {{$message}} Recuerde que su contraseña debe tener 8 caracteres, 1 mayúscula, 1 minúscula y un carácter especial. --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="password">Confirme Contraseña</label>
                                <div class="input-group">
                                  <input type="password" class="form-control" id="password" name="password1" value="" >
                                </div>
                                @error('password1')
                                <br>
                                <small>-- {{$message}} Recuerde que su contraseña debe tener 8 caracteres, 1 mayúscula, 1 minúscula y un carácter especial. --</small>
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