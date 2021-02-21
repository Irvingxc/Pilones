@extends('layouts.app')

@section('content')
<div class="row">
<div class="card col">
<div id="calendar"></div>

</div>

</div>

<div class="modal fade container" id="agenda_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Temperatura Diaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
      <form action="" id="formulario_agenda">
      <label for="" class="col-md-5">Fecha Actual</label>
      <input type="date" class="col-md-6" id="txtFecha">
      </div>
        <label for="" class="col-md-5">Temperatura del Pilon</label>
        <input type="text" class="col-md-6">

      </div>
      <div class="form-check">
      <label class="col-md-5" for="flexRadioDefault1">
    Se viro
  </label>
  <input class="form-check-input col-md-6" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
</div>


      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="guardar()">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
      editable: true,
    });
    calendar.render();
})

function guardar(){
  var fd = new FormData(document.getElementById("formulario_agenda"));
};

</script>
