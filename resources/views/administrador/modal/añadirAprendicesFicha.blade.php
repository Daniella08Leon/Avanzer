<!--Inicio modal crear-->
@foreach ($result as $fichas)
        <div class="modal fade" id="ModalAñadirAprendizFicha{{ $fichas->idFicha }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Aprendices a la Ficha </h5>
                          </div>
                          <div class="modal-body">
                            <form action="/administrador/actualizar/aprendiz/ficha/{{$fichas->idFicha}}" method="post">
                            @csrf 
                              <div class="form-group">
                                <label for="ficha">Ficha</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="ficha" name="ficha" value="{{$fichas->ficha}}" readonly>
                                </div>
                              </div>
                              
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="ficha">Aprendices</label>
                                </div>
                                @if(count($aprendiz)<=0)
                                  <tr>
                                    <td colspan="10" class="text-center">No hay Aprendices</td>
                                  </tr>
                                @else
                                @foreach ($aprendiz as $apren) 
                                  <div class="pretty p-icon p-jelly p-round p-bigger">
                                  <input type="checkbox" id="{{ $apren->nombreAprendiz }}" name="aprendiz[]" value="{{ $apren->idAprendiz }}"/>
                                    <div class="state p-info">
                                      <i class="icon material-icons">done</i>
                                      <label for="{{ $apren->nombreAprendiz }}">{{ $apren->nombreAprendiz }}</label>
                                    </div>
                                  </div><br/>
                                @endforeach
                                @error('aprendiz')
                                <br>
                                <small>-- {{$message}} Y debe elegir mínimo uno --</small>
                                <br>
                              @enderror
                              @endif
                  </div>
                              
                          <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Guardar</button></form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
<!--Fin modal crear-->