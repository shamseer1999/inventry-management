@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      List Categories
      <a href="{{route('category.add')}}" class="btn btn-primary" style="float:right;">Add Category</a>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Sl.No</th>
            <th scope="col">Category Name</th>
          </tr>
        </thead>
        <tbody>
          @if (sizeof($results) > 0)
              @foreach ($results as $item)
                  <tr>
                    <td>{{$results->firstItem()+$loop->index}}</td>
                    <td>{{$item->category_name}}</td>
                  </tr>
              @endforeach
          @endif
        </tbody>
      </table>
      {{$results->links()}}
    </div>
  </div>
@endsection