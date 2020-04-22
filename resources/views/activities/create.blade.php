@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Activity
    </div>

    <div class="card-body">
        <form action="{{ route("activities.store") }}" method="POST" enctype="multipart/form-data" id="create">
            {{ csrf_field()}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($activity) ? $activity->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time"> Activity Start Time </label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($activity) ? $activity->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                      {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('recurrence') ? 'has-error' : '' }}">
                <label>Recurrence</label>
                @foreach(App\Activity::RECURRENCE_RADIO as $key => $label)
                    <div>
                        <input id="recurrence_{{ $key }}" name="recurrence" type="radio" value="{{ $key }}" {{ old('recurrence', 'none') === (string)$key ? 'checked' : '' }} required>
                        <label for="recurrence_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('recurrence'))
                    <em class="invalid-feedback">
                        {{ $errors->first('recurrence') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                <label for="area"> Area </label>
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
                <textarea id="info" class="form-control" name="info" form="create" value="{{ old('info', isset($activity) ? $activity->info : '') }}" ></textarea>

                @if($errors->has('info'))
                    <em class="invalid-feedback">
                        {{ $errors->first('info') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="Create">
            </div>
        </form>


    </div>
</div>


@endsection
