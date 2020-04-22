@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Activity
    </div>

    <div class="card-body">
        <form action="{{ route("activities.update", [$activity->id]) }}" method="POST" enctype="multipart/form-data" id="edit">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name"> Name </label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($activity) ? $activity->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">Start Time</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($activity) ? $activity->start_time : '') }}">
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                <label for="area">Area</label>
                <select name="area_id" id="area" class="form-control select2">
                    @foreach($areas as $id => $area)
                        <option value="{{ $id }}" {{ (isset($activity) && $activity->area ? $activity->area->id : old('area_id')) == $id ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
                @if($errors->has('area_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('area_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('venue') ? 'has-error' : '' }}">
                <label for="venue">Venue</label>
                <input type="text" id="venue" name="venue" class="form-control" value="{{ old('venue', isset($activity) ? $activity->venue : '') }}">
                @if($errors->has('venue'))
                    <em class="invalid-feedback">
                        {{ $errors->first('venue') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('info') ? 'has-error' : '' }}">
                <label for="info">Info</label>
                <textarea id="info" class="form-control" name="info" form="edit" value="{{ old('info', isset($activity) ? $activity->info : '') }}" >{{$activity->info}}</textarea>

                @if($errors->has('info'))
                    <em class="invalid-feedback">
                        {{ $errors->first('info') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>






            <div>
                <input class="btn btn-danger" type="submit" value="Update">
            </div>
        </form>


    </div>
</div>
@endsection
