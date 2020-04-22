
@extends('layouts.admin')

@section('content')
<h1>Area</h1>
<hr>
<div class="panel-body">
  @if(count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if(\Session::has('success'))
    <div class="alert alert-success" role="alert">
      <p>{{ \Session::get('success') }}</p>
    </div>
  @endif
  <table id="datatable" class="table table-borderless table-data3 task-table">
      <thead>
        <tr class="text-right">
          <th scope="col" >No.</th>
          <th scope="col"> Area ID </th>
          <th scope="col">Area Name </th>
          <th scope="col" style="padding-right:145px">Action</th>
        </tr>
      </thead>
      @if(count($areas)>0)
      <tbody class="text-right">
        <div class="form-popup" id="myForm" onclick="redirect(/home)">
        @foreach( $areas as $i => $area)
        <tr>
          <td class="table-text">
            {{ $i+1 }}
          </td>
          <td class="table-text">
            {{ $area->id }}
          </td>
          <td class="table-text">
            {{ $area->name }}
          </td>
          <td class="table-text">
            <a href=" {{ route('area.show',$area->id)}}" class="btn btn-info" style="margin-left:10px;">VIEW</a>
            <a href="#" class="edit btn btn-success" style="margin-left:10px;" >EDIT</a>
            <a href="#" class="delete btn btn-danger" style="margin-left:10px;">DELETE</a>
          </td>

        </tr>

        @endforeach
      </tbody>
      @endif
  </table>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
    Create New Area
  </button>

  <!-- CREATE Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Area</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ action('AreaController@store') }}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label> Name </label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name of Area">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!--END CREATE MODAL -->

  <!-- EDIT Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Area</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/areas" method="POST" id="editForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="modal-body">
            <div class="form-group">

              <label> Name </label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name of Area">

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!--END EDIT MODAL -->


  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Area</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/areas" method="POST" id="deleteForm">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="modal-body">
            <input type="hidden" name="_method" value="DELETE">
            <p>Any data with sub-data cannot be delete.</p>
            <p>Data deleted cannot be recover.</p>
            <p>Are you sure to delete?</p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">YES!DELETE</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <!--END DELETE MODAL -->

</div>



@endsection
