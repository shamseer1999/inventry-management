@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      List Users
      <a href="{{route('register')}}" class="btn btn-primary" style="float:right;">Add User</a>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Sl.No</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (sizeof($results) > 0)
              @foreach ($results as $item)
                  <tr>
                    <td>{{$results->firstItem()+$loop->index}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                      @if ($item->role ==1)
                          {{'Admin'}}
                      @elseif($item->role ==2)
                          {{'User'}}
                      @else
                          {{'Agent'}}
                      @endif
                    </td>
                    <td>
                      @if ($item->status ==1)
                          {{'Active'}}
                      @else
                          {{'Inactive'}}
                      @endif
                    </td>
                    <td>
                      @if ($item->status ==1)
                          <a href="{{route('user.deactivate',encrypt($item->id))}}" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to  deactivate this user ?')">Deactivate</a>
                      @else
                          <a href="{{route('user.activate',encrypt($item->id))}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to  activate this user ?')">Activate</a>
                      @endif
                    </td>
                  </tr>
              @endforeach
          @endif
        </tbody>
      </table>
      {{$results->links()}}
    </div>
  </div>
@endsection