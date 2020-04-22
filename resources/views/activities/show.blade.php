@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Activity
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Activity ID
                        </th>
                        <td>
                            {{ $activity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $activity->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Start Time
                        </th>
                        <td>
                            {{ $activity->start_time ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Area
                        </th>
                        <td>
                            {{ $activity->area->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Venue
                        </th>
                        <td>
                            {{ $activity->venue ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Info
                        </th>
                        <td>
                            {{ $activity->info ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back to list
            </a>
        </div>


    </div>
</div>
@endsection
