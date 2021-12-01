<!--Inicio modal editar-->
@foreach ($result as $usuario)
        <div class="modal fade" id="ModalEditarAprendiz{{ $usuario->idUsuario }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Aprendiz</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/administrador/editar/aprendiz/{{$usuario->idAprendiz}}/{{$usuario->idUsuarioFK}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="idFicha">Ficha</label>
                                <div class="input-group">
                                <input type="hidden" class="form-control" id="idUsuarioFK" name="idUsuarioFK" value="{{@old('idUsuarioFK') ? @old('idUsuarioFK') : $usuario->idUsuarioFK}}">
                                <select class="form-control" id="idFicha" name="idFicha">
                                    <option value="{{ $usuario->idFicha}}">{{ $usuario->ficha }}</option>
                                    @foreach ($ficha as $fichas)
                                    <option value="{{ $fichas->idFicha}}">{{ $fichas->ficha }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="nombreAprendiz">Nombre Aprendiz</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreAprendiz" name="nombreAprendiz" value="{{@old('nombreAprendiz') ? @old('nombreAprendiz') : $usuario->nombreAprendiz}}">
                                </div>
                                @error('nombreAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="apellidoAprendiz">Apellido Aprendiz</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="apellidoAprendiz" name="apellidoAprendiz" value="{{@old('apellidoAprendiz') ? @old('apellidoAprendiz') : $usuario->apellidoAprendiz}}">
                                </div>
                              @error('apellidoAprendiz')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="email">Email Aprendiz</label>
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
                                <label for="documentoAprendiz">Documento Aprendiz</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="documentoAprendiz" name="documentoAprendiz" value="{{@old('documentoAprendiz') ? @old('documentoAprendiz') : $usuario->documentoAprendiz}}">
                                </div>
                              @error('documentoAprendiz')
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