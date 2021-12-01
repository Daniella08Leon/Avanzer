<!--Inicio modal editar-->
        <div class="modal fade" id="ModalCrearFicha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Crear Ficha</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/administrador/crear/ficha" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="idProgramaFK">Programa</label>
                                <div class="input-group">
                                <select class="form-control" id="idProgramaFK" name="idProgramaFK">
                                    @foreach ($programa as $progr)
                                    <option value="{{$progr->idPrograma}}">{{ $progr->nombrePrograma }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              @error('idProgramaFK')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="idInstructorFK">Nombre Instructor</label>
                                <div class="input-group">
                                  <select class="form-control" id="idInstructorFK" name="idInstructorFK">
                                    @foreach ($instructor as $instru)
                                    <option value="{{$instru->idInstructor}}">{{ $instru->nombreInstructor }} {{ $instru->apellidoInstructor }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              @error('idInstructorFK')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="ficha">Nombre Ficha</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="ficha" name="ficha" value="{{old('ficha')}}">
                                </div>
                              @error('ficha')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="fechaInicio">Fecha Inicio de la ficha</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="">
                                </div>
                              @error('fechaInicio')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="fechaFin">Fecha Fin de la ficha</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="">
                                </div>
                              @error('fechaFin')
                                <br>
                                <small>-- {{$message}} --</small>
                                <br>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="estadoFicha">Estado de la Ficha</label>
                                <div class="input-group">
                                <select class="form-control" id="estadoFicha" name="estadoFicha">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                  </select>                                
                                </div>
                              @error('estadoFicha')
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