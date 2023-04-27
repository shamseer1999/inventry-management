@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      Add Category
    </div>
    <div class="card-body">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form action="" method="post">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Category Name</label>
              <input type="text" class="form-control" id="cat_name" name="cat_name" required value="{{old('cat_name')}}">
            </div>
            <div class="form-group mt-1">
                <input type="submit" class="btn btn-primary"  value="Add Category">
            </div>
          </form>
    </div>
  </div>
@endsection