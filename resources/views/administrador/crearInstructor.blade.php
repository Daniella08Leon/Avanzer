<!--Inicio modal editar-->
<div class="modal fade" id="ModalCrearInstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Crear Instructor</h5>
                          </div>
                          <div class="modal-body">
                             <form action="/crear/instructor" method="post">
                             @csrf 
                              <div class="form-group"> 
                                <label for="nombreInstructor">Nombres Instructor</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="nombreInstructor" name="nombreInstructor" value="{{old('nombreInstructor')}}">
                                </div>
                              @error('nombreInstructor')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="apellidoInstructor">Apellidos Instructor</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="apellidoInstructor" name="apellidoInstructor" value="{{old('apellidoInstructor')}}">
                                </div>
                              @error('apellidoInstructor')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="documentoInstructor">Documento Instructor</label>
                                <div class="input-group">
                                  <input type="number" class="form-control" id="documentoInstructor" name="documentoInstructor" value="{{old('documentoInstructor')}}">
                                </div>
                              @error('documentoInstructor')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="email">Email Instructor</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                  <input type="hidden" class="form-control" id="password" name="password" value="avanzerinstructor">
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