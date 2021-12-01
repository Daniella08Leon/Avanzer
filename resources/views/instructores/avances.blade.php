
@extends('menu.menuInstructor')

@section('avances')
<section class="section">
<div class="section-body">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Avances</h4>
                    <a href="{{ url('/instructor/avances/PDF/'.$idEvidenciaFK.'/'.$idFichaFK) }}" class="btn btn-icon btn-dark" title="pdf"><i class="far fa-file"></i></a>
                  </div>
				  <div class="card-header">
                    <h4>Seleccione una evidencia</h4>
					@foreach ($result[0] as $evidencia)
	                <a type="button" class="btn btn-outline-primary mx-1" href="{{ url('/instructor/verAvancesFiltrados/'.$evidencia->idFicha.'/'.$evidencia->idEvidenciaFK) }}">{{ $evidencia->nombreEvidencia }}</a><br>
	                @endforeach
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
							  <th>Proyecto</th>
				              <th>Evidencia</th>
				              <th>Comentario Evidencia</th>
				              <th>Nombre Evidencia</th>
				              <th>Avance</th>
				              <th>Editar</th>
				              <th>Eliminar</th>
                        </thead>
                        <tbody>
                        @if(count($result[1])<=0)
                            <tr>
                              <td colspan="10" class="text-center">Vacío</td>
                            </tr>
                        @else
						              @foreach ($result[1] as $avances)
						              <tr>
							              <td>{{ $avances->nombreProyecto }}</td>
                            <td><a href="{{ $avances->evidenciaAprendiz }}"class="btn btn-outline-primary" target="_blank">ir a la evidencia</a></td>
                            <td>{{ $avances->comentario }}</td>
                            <td>{{ $avances->nombreEvidencia }}</td>
                            <td>{{ $avances->avance }}</td> 
                            <td><a href="#" type="button" class="btn btn-primary btn-action mr-1" data-toggle="modal" title="Editar" data-target="#ModalEditarAvance{{ $avances->idAvance }}"><i class="fas fa-pencil-alt"></i></a></td>
							              <td>
                                <form action="/instructor/borrar/avance/{{$avances->idAvance}}" method="post" class="borrarF">
                                @csrf
                                  <a type="submit" class="btn btn-icon btn-danger eliminar-evi" title="Eliminar" onClick="confirmar(event,this)"><i class="far fa-trash-alt"></i></a>
                                </form>
                              </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </section>
		@include('instructores.editarAvance')

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
