<!--Inicio modal editar-->
@foreach ($result as $usuario)
        <div class="modal fade" id="ModalEditarInstructor{{ $usuario->idUsuario }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Instructor</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/administrador/editar/Instructor/{{$usuario->idInstructor}}/{{$usuario->idUsuarioFK}}" method="post">
                            @csrf 
                              <div class="form-group">
                                <label for="nombreInstructor">Nombre Instructor</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreInstructor" name="nombreInstructor" value="{{@old('nombreInstructor') ? @old('nombreInstructor') : $usuario->nombreInstructor}}">
                                </div>
                                @error('nombreInstructor')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div> 
                              <div class="form-group">
                                <label for="apellidoInstructor">Apellido Instructor</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="apellidoInstructor" name="apellidoInstructor" value="{{@old('apellidoInstructor') ? @old('apellidoInstructor') : $usuario->apellidoInstructor}}">
                                </div>
                                @error('apellidoInstructor')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="email">Email Instructor</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="email" name="email" value="{{@old('email') ? @old('email') : $usuario->email}}">
                                </div>
                                @error('email')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="documentoInstructor">Documento Instructor</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="documentoInstructor" name="documentoInstructor" value="{{@old('documentoInstructor') ? @old('documentoInstructor') : $usuario->documentoInstructor}}">
                                </div>
                              @error('documentoInstructor')
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