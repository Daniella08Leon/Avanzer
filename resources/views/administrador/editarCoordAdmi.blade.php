<!--Inicio modal editar-->
@foreach ($result as $usuario)
        <div class="modal fade" id="ModalEditarUsuario{{ $usuario->idUsuario }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Usuario</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/administrador/editar/Usuario/{{$usuario->idUsuario}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="NombreRol">Rol</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="idRolFK" name="idRolFK" value="{{$usuario->NombreRol}}" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="email">Email Usuario</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="email" name="email" value="{{@old('email') ? @old('email') : $usuario->email}}">
                                </div>
                              @error('email')
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