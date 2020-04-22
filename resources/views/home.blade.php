@extends('layouts.admin')
@section('content')
<h3 class="page-title">Calendar</h3>
<div class="card">
  <div class="card-header">
    Activity Calendar
  </div>
  <div class="card-body">
    <form action="{{ route('calendar') }}" method="GET">
      Area:
        <select name="area_id">

          <option value="">-- all areas --</option>
          @foreach($areas as $area)
          <option value="{{ $area->id }}"
            @if (request('area_id') == $area->id) selected
            @endif>{{ $area->name }}</option>
          @endforeach
          </select>
          <button type="submit" class="btn btn-sm btn-primary">Filter</button>
    </form>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <div id="calendar"></div>
  </div>
</div>

<div class="copyright">
  <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
</div>



@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<script>
    $(document).ready(function () {
            activities={!! json_encode($activities) !!};
            $('#calendar').fullCalendar({
              events: activities,

            })
        });
</script>
@stop
<!-- end document-->
