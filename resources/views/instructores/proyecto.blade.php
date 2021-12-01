
@extends('menu.menuInstructor')

@section('proyectoInd')
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><strong>Proyecto: </strong>{{ $result[1]->nombreProyecto }}</h4>
                  </div>
				  <div class="card-header">
          <form action="/proyecto/desintegrar/{{$result[1]->idProyecto}}" method="post" class="borrarF">
            @csrf
            <button type="button" class="btn btn-primary m-3 eliminar-evi" title="Eliminar" onClick="confirmar(event,this)">Desintegrar Proyecto</button>
          </form>
		            <a type="button" class="btn btn-primary m-3" href="{{ url('instructor/proyecto/evidencias/'.$result[1]->idProyecto) }}">Evidencias Proyecto</a><br/>
		            <a type="button" class="btn btn-primary m-3" href="{{ url('instructor/proyecto/'.$result[1]->idFicha.'/nuevo/'.$result[1]->idProyecto) }}">Añadir Aprendiz</a><br/>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
					@foreach ($result[0] as $proyec)
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">{{ $proyec->nombreAprendiz }} {{ $proyec->apellidoAprendiz }}</div>
                          <div class="media-title"></div>
                        </div>
                        <div class="media-cta">
                        <form action="/aprendizP/borrar/{{$proyec->idAprendiz_proyectos}}" method="post" class="borrarF">
                        @csrf
                        <a type="button" class="btn btn-outline-primary eliminar-evi" title="Eliminar" onClick="confirmarApre(event,this)">Eliminar Aprendiz</a>
                        </form>
                        </div>
                      </li><br/>
					  @endforeach
                    </ul>
                  </div>
                </div>
              </div>

</div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script defer>

 function confirmar(event, boton){
  event.preventDefault()
        Swal.fire({
        title: 'Estas seguro?',
        text: "No podrás reestablecer este grupo",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Desintegrar'
      }).then((result) => {
          if (result.value===true) {
          console.log(boton.parentElement)
          boton.parentElement.submit()
        }
      })
    }

    function confirmarApre(event, boton){
  event.preventDefault()
        Swal.fire({
        title: 'Estas seguro?',
        text: "No podrás reestablecer a este aprendiz",
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