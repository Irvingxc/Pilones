@extends('layouts.app')

@section('content')
<div class="row">
<div class="card col">
<br>
@isset($id)
<input type="hidden" id="pilon_id" value="{{$id}}">
@endisset
<a id="completado" href="{{route('pilon.grafico')}}" class="btn btn-primary col-md-2" target="_blank">Ver Grafico</a>
<br>
<div id="calendar"></div>

</div>

</div>

<div class="modal fade Container" id="agenda_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Temperatura Diaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div> 
      <form action="" id="formulario_agenda">
      @csrf
      <input type="hidden" name="id" id="id_impor" value="">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      <div class="modal-body">
      <div>
      <label for="" class="col-md-5">Fecha Actual</label>
      <input type="date" class="col-md-6" id="txtFecha" name="fecha"  readonly>
      </div>
      @if ($errors->has('fecha_detalle'))
      <p style="color:red;">{{$errors->first('fecha_detalle')}}</p>
      @endif
      <br>      
        <label for="" class="col-md-5">Temperatura del Pilon</label>
        <input type="text" class="col-md-6" id="temperatura">

      </div>
      <div class="form-check">
      <label class="form-check-label col-md-5" for="flexCheckDefault">
      <input class="form-check-input col-md-10" type="checkbox" name="virado" id="virado">
    Se viro
  </label>
  <label class="form-check-label col-md-5" for="flexCheckDefault">
      <input class="form-check-input col-md-10" type="checkbox" name="mojado" id="mojado">
    Mojado
  </label>
  <label class="form-check-label col-md-5" for="flexCheckDefault">
      <input class="form-check-input col-md-12" type="checkbox" name="fumigado" id="fumigado">
    Fumigado
  </label>
</div>

      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="guardar()">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" onclick="limpiar()" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

<link href='{{asset("/packages/core/main.css")}}' rel='stylesheet' />
<link href='{{asset("/packages/daygrid/main.css")}}' rel='stylesheet' />
<link href='{{asset("/packages/timegrid/main.css")}}' rel='stylesheet' />




<script src="{{asset('packages/core/main.js')}}"></script>
<script src="{{asset('packages/interaction/main.js')}}"></script>
<script src="{{asset('packages/daygrid/main.js')}}"></script>
<script src="{{asset('packages/moment.min.js')}}"></script>

<script src="{{asset('packages/core/locale/es.js')}}"></script>
 

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      //timeZone: 'America/Tegucigalpa',
        locale: 'es',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'momentTimezone'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth'
      },
      
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        let m = moment(arg.start).format("YYYY-MM-DD")
        $("#agenda_modal").modal();
        $("#txtFecha").val(m);
        calendar.unselect()
      },



      eventClick: function(info){
        let m = moment(info.event.start).format("YYYY-MM-DD")
        $("#agenda_modal").modal();
        $("#txtFecha").val(m);
        $("#temperatura").val(info.event.title);
        $("#id_impor").val(info.event.id);
        if(info.event.extendedProps.virado==1){
          
        $('input:checkbox[name=virado]').prop('checked',true)
      }else{
        $('input[type=checkbox]').prop('checked',false)
      }

      if(info.event.extendedProps.fumigado==1){
          
          $('input:checkbox[name=fumigado]').prop('checked',true)
        }else{
          $('input:checkbox[name=fumigado]').prop('checked',false)
        }

        if(info.event.extendedProps.mojado==1){
          
          $('input:checkbox[name=mojado]').prop('checked',true)
        }else{
          $('input:checkbox[name=mojado]').prop('checked',false)
        }
        //console.log(info.event.extendedProps.virado);
       // console.log(info.event.id);
      },
      editable: true,
      events: '/detalledatopilon/listar/'+$("#pilon_id").val(),

    });
    calendar.render();
})

$('#completado').on('click', function (){
let dato = 'title';
this.href= "/pilon/grafico/"+dato;
// Código alfa (para evaluar resultado en es.stackoverflow.com)
//this.href=window.location.href+"?id=5&"+this.href.split("?")[1];alert(this.href);
// Código beta (para producción deberá funcionar en tu escenario)
//this.href=window.location.href+"&"+this.href.split("?")[1];

});
function limpiar(){
  $("#agenda_modal").modal('hide');
  $("#txtFecha").val("");
  $("#temperatura").val("");
  $('input[type=checkbox]').prop('checked',false);
  location.reload();
  //$('input:checkbox').removeAttr('checked');

}


function guardar(){
  //var fd = new FormData(document.getElementById("formulario_agenda"));
 // console.log(fd);
  
  let fecha_detalle = $("#txtFecha").val();
  let temperatura = $("#temperatura").val();
  let virado= $('input:checkbox[name=virado]:checked').val();
  //$("#virado").val();
  let mojado= $('input:checkbox[name=mojado]:checked').val();
  // $("#mojado").val();
  //let fumigado= $("#fumigado").val();
  let pilon_id= $("#pilon_id").val();
  let _token= "{{ csrf_token() }}";
  let fumigado = $('input:checkbox[name=fumigado]:checked').val();
  if(fumigado=="on"){
    fumigado=1;
  }else{
    fumigado=0;
  }
  if(virado=="on"){
    virado=1;
  }else{
    virado=0;
  }
  if(mojado=="on"){
    mojado=1;
  }else{
    mojado=0;
  }
  let id_impor = $("#id_impor").val();

  if(id_impor==""){
    $.ajax({
    url: "/detalledatopilon/store",
    method: "post",
    data: {fecha_detalle: fecha_detalle,
      temperatura: temperatura,
      virado: virado,
      mojado: mojado,
      fumigado: fumigado,
      pilon_id: pilon_id,
      _token: _token},
   // processData:false,
  //  contenType:false
  }).done(function(respuesta){
    console.log(status);
    if(respuesta!=null){
      alert("Se guardo correctamente");
      limpiar();
    }else{
      alert("Algo Salio Mal, verifica la veracidad de los datos");
    }
  })


  }else{
    $.ajax({
    url: '/detalledatopilon/update/'+id_impor,
    method: "post",
    data: {fecha_detalle: fecha_detalle,
      temperatura: temperatura,
      virado: virado,
      mojado: mojado,
      fumigado: fumigado,
      pilon_id: pilon_id,
      _token: _token},
   // processData:false,
  //  contenType:false
  }).done(function(respuesta){
    console.log(status);
    if(respuesta!=null){
      alert("Se Actualizo correctamente");
      limpiar();
    }else{
      alert("Algo Salio Mal, verifica la veracidad de los datos");
    }
  })



  }
  //let _token= $('meta[name="csrf-token"]').attr('content');
  //fd.append("_token", _token);
 // fd.append("token", )
 

}

</script>
