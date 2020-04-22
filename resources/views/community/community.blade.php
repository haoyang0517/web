@extends('layouts.admin')

@section('content')
<div>
  <div>
    <h1>Community List</h1>
    <h3>Chapter: $chapter->name </h3>
    <h3>District: $district->name </h3>
    <h3>Block: $block->name </h3>
  </div>
  <div>
    <table>
      <!-- heading -->
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Contact Number</th>
          <th>Email</th>
        </tr>
      <!-- data -->
      <tbody>
        @foreach ($members as $i => $member)
          <tr>
            <!-- Number -->
            <td>
              <div>{{ $i+1 }}</div>
            </td>
            <!-- name -->
            <td>
              <div>{{$member->name}}</div>
            </td>
            <!-- contact -->
            <td>
              <div>{{$member->contact_no}}</div>
            </td>
            <!-- email -->
            <td>
              <div>{{$member->email}}</div>
            </td>
            <!-- action -->
            <td>
              <div>
                {!! link_to_route(
                  'member.edit',
                  $title = 'Edit',
                  $parameters = [
                    'id' => $member->id,
                  ]
                ) !!}
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
