@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
          <a class="btn btn-success" href="{{ route("activities.create") }}">
              Create Activity
          </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Activity List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-sm table-bordered table-striped table-hover datatable datatable-activity task-table">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                          No
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Activity ID
                        </th>
                        <th>
                          Area
                        </th>
                        <th>
                          Start Time
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $key => $activity)
                        <tr data-entry-id="{{ $activity->id }}">
                            <td>

                            </td>
                            <td>
                              {{ $key+1 }}
                            </td>
                            <td>
                                {{ $activity->name ?? '' }}
                            </td>
                            <td>
                                {{ $activity->id ?? '' }}
                            </td>
                            <td>
                                {{ $activity->area->name ?? '' }}
                            </td>
                            <td>
                                {{ $activity->start_time ?? '' }}
                            </td>
                            <td>

                                    <a class="btn btn-sm btn-primary" href="{{ route('activities.show', $activity->id) }}">
                                        VIEW
                                    </a>
                                    <a class="btn btn-sm btn-info" href="{{ route('activities.edit', $activity->id) }}">
                                        EDIT
                                    </a>
                                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" onsubmit="return confirm('Deleted cannot be recover! Any of future recurring activities will be delete also! Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="DELETE">
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  let deleteButton = {
    text: "Datatable Delete",
    url: "{{ route('activities.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('Area you sure')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-activity:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
