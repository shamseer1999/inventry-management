@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      Assign Distributor
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
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="product" value="{{$product->product_name}}" required>
            </div>
            <div class="form-group">
                <label for="">Distributors</label>
                <select class="form-control" name="distributor" id="category" required>
                  <option value=""> --SELECT--</option>
                  @if (!empty($distributors))
                      @foreach ($distributors as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                  @endif
                </select>
            </div>
            <div class="form-group mt-1">
                <input type="submit" class="btn btn-primary"  value="Assign Distributor">
            </div>
          </form>
    </div>
  </div>
@endsection