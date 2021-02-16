@extends('layouts.app')

@section('content')
<div class="row">
<div class="card col">
<div id="calendar"></div>

</div>

</div>

<div class="modal fade" id="agenda_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Temperatura Pilon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
      <label for="" class="col-md-5">Fecha Actual</label>
      <input type="text" class="col-md-6">
      </div>
        <label for="" class="col-md-5">Temperatura del Pilon</label>
        <input type="text" class="col-md-6">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
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
<script src="{{asset('packages/timegrid/main.js')}}"></script>

<script src="{{asset('packages/core/locale/es.js')}}"></script>
 

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        $("#agenda_modal").modal();
        calendar.unselect()
      },
      editable: true,
    });
    calendar.render();
});
</script>
