@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      Add Product
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
              <label for="formGroupExampleInput">Product Name</label>
              <input type="text" class="form-control" id="product_name" name="product_name"  required value="{{old('product_name')}}">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Sale Price</label>
              <input type="number" class="form-control" name="sel_price" id="sel_price"  required value="{{old('sel_price')}}">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">MRP</label>
              <input type="number" name="mrp" class="form-control" id="mrp" required value="{{old('mrp')}}">
            </div>
            <div class="form-group">
              <label for="">Quantity</label>
              <input type="number" class="form-control" name="qty">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category" id="category" required>
                  <option value=""> --SELECT--</option>
                  @if (!empty($categories))
                      @foreach ($categories as $item)
                          <option value="{{$item->id}}">{{$item->category_name}}</option>
                      @endforeach
                  @endif
                </select>
            </div>
            <div class="form-group mt-1">
                <input type="submit" class="btn btn-primary"  value="Add Product">
            </div>
          </form>
    </div>
  </div>
@endsection