
@extends('menu.menuAdmi')

@section('evidenciasFichas')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                <div class="card-header">
                <div style="width: 450px;">
                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAñadireviden">Crear Evidencia</a><br/>
                  </div>
                    <h4>Evidencias Fichas</h4>
                    <div class="card-header-form">
                      <form action="{{route('administrador.getEvidenciasFichas')}}" method="get">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar" name="texto" value="{{$texto}}">
                          <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Ficha</th> 
                            <th>Nombre Evidencia</th>
                            <th>Fase</th>
                            <th>Link</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                        @if(count($result)<=0)
                            <tr>
                              <td colspan="10" class="text-center">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($result as $evi)
                            <tr>
                                <td>{{ $evi->idEvidencia_ficha }}</td>
                                <td>{{ $evi->fechaInicio }}</td>
                                <td>{{ $evi->fechaFin }}</td>
                                <td>{{ $evi->ficha }}</td>
                                <td>{{ $evi->nombreEvidencia }}</td>
                                <td>{{ $evi->faseEvidencia }}</td>
                                <td><a href="{{ $evi->evidenciaP }}" class="btn btn-outline-primary" target="_blank">Evidencia</a></td>
                                @if ($evi->estadoEvidencia === 1)
                                  <td><div class="badge badge-success">Activo</div></td> 
                                @elseif ($evi->estadoEvidencia === 0)
                                  <td><div class="badge badge-danger">Inactivo</div></td>
                                @endif
                                <td>
                                <form action="/administrador/borrar/evidencias/fichas/{{$evi->idEvidencia_ficha}}" method="post" class="borrarF">
                                @csrf
                                  <a type="submit" class="btn btn-icon btn-danger eliminar-evi" title="Eliminar" onClick="confirmar(event,this)"><i class="far fa-trash-alt"></i></a>
                                </form>
                                </td>
                                @endforeach
                            </tr> 
                            @endif
                        </tbody>
                      </table>
                      {{$result->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </section>
        @include('administrador.crearEvideFichas')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script defer>

 function confirmar(event, boton){
  event.preventDefault()
        Swal.fire({
        title: 'Estas seguro?',
        text: "No podrás reestablecer este registro",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Borrar'
      }).then((result) => {
          if (result.value===true) {
          console.log(boton.parentElement)
          boton.parentElement.submit()
        }
      })
    }

</script>

@endsection

