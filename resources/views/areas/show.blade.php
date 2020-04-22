
@extends('layouts.admin')

@section('content')

<div class="panel-body">
<h3>  Area ID   : {{$parent->id}}</h1>
<h3>  Area Name : {{$parent->name}}</h1>
<hr>
  @if(\Session::has('success'))
    <div class="alert alert-success" role="alert">
      <p>{{ \Session::get('success') }}</p>
    </div>
  @endif
  @if(count($areas)==0 AND count($members)==0)
    <div class="alert alert-danger">
      <p> No data available. Do you want to create it?</p>
      <p> You can create a sub-area or assign members into this area.</p>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
      Create New Area
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMemberModal">
      ADD Members
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

          <form action="{{ action('AreaController@storeChildArea',['id'=>$parent->id]) }}" method="POST">
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
    <!--START ADD MODAL -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD MEMBER</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="{{ action('AreaController@storeMember',['id'=>$parent->id]) }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="form-group">
                <label> Email </label>
                <input type="text" name="email" class="form-control" placeholder="Enter email of member with account.">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Add Member</button>
            </div>

          </form>

        </div>
      </div>
    </div>




  @elseif(count($areas)>0)
  <table id="datatable" class="table table-borderless table-data3 task-table">
      <thead>
        <tr class="text-right">
          <th scope="col">No.</th>
          <th scope="col"> Area ID </th>
          <th scope="col">Area Name </th>
          <th scope="col" style="padding-right:145px">Action</th>
        </tr>
      </thead>

      <tbody class="text-right">
        <div class="form-popup" id="myForm" onclick="redirect(/home)">
        @foreach( $areas as $i => $area)
        <tr>
          <td class="table-text" style="padding-left:20px">
            {{ $i+1 }}
          </td>
          <td class="table-text">
            {{ $area->id }}
          </td>
          <td class="table-text">
            {{ $area->name }}
          </td>
          <td class="table-text">
            <a href=" {{ route('area.show',$area->id)}}" class=" btn btn-info" >VIEW</a>
            <a href="#" class="edit btn btn-success" style="margin-left:10px;">EDIT</a>
            <a href="#" class="delete btn btn-danger" style="margin-left:10px;">DELETE</a>
          </td>
        </tr>
        @endforeach
      </tbody>
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

          <form action="{{ action('AreaController@storeChildArea',['id'=>$parent->id]) }}" method="POST">
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
  <!--START DELETE MODAL -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Area</h5>
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




  <!--For smallest area with members-->


  @else
  <table id="datatable" class="table table-bordered table-striped task-table">
      <thead>
        <tr>
          <th scope="col" style="padding-left:20px">No.</th>
          <th scope="col"> Member Name</th>
          <th scope="col"> Email </th>
          <th scope="col"> Contact No. </th>
          <th scope="col" style="padding-left:70px">Action</th>
        </tr>
      </thead>

      <tbody>
        <div class="form-popup" id="myForm" onclick="redirect(/home)">
        @foreach( $members as $i => $member)
        <tr>
          <td class="table-text" style="padding-left:20px">
            {{ $i+1 }}
          </td>
          <td class="table-text">
            {{ $member->name }}
          </td>
          <td class="table-text">
            {{ $member->email }}
          </td>
          <td class="table-text">
            {{ $member->contact_no }}
          </td>
          <td class="table-text">
            <a href="#"  class="remove btn btn-danger" style="margin-left:10px">Remove member</a>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMemberModal">
    ADD Members
  </button>
  <!--START ADD MEMBER MODAL -->
  <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ action('AreaController@storeMember',['id'=>$parent->id]) }}" method="POST">
          {{ csrf_field() }}

          <div class="modal-body">
            <div class="form-group">
              <label> Email </label>
              <input type="text" name="email" class="form-control" placeholder="Enter email of member with account.">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Member</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remove member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/members "id="removeForm" method="POST" >
          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <div class="modal-body">
            <div class="form-group">
              <p>Remove of member will not be recovery</p>
              <p>But you can add them into the area again.</p>
              <p>Do you want to remove?</p>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Remove Member</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  @endif

</div>



@endsection
