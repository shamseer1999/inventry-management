@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      List Products
      <a href="{{route('product.add')}}" class="btn btn-primary" style="float:right;">Add Product</a>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Sl.No</th>
            <th scope="col">Product Name</th>
            <th scope="col">MRP</th>
            <th scope="col">Sale Price</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>
            <th scope="col">Assigned Distributor</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (sizeof($results) > 0)
              @foreach ($results as $item)
                  <tr>
                    <td>{{$results->firstItem()+$loop->index}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->mrp}}</td>
                    <td>{{$item->sale_price}}</td>
                    
                    <td>{{$item->categories->category_name}}</td>
                    <td>
                      @if ($item->status ==1)
                          {{'Active'}}
                        @else
                          {{'Inactive'}}
                      @endif
                    </td>
                    <td>{{$item->assigned->name}}</td>
                    <td>
                        <a href="{{route('product.edit',encrypt($item->id))}}" class="btn btn-primary">Edit</a>
                        @if ($item->status ==1)
                          <a href="{{route('product.assign',encrypt($item->id))}}" class="btn btn-primary">Assign to Distributer</a>

                          <a href="{{route('product.deactivate',encrypt($item->id))}}" onclick="return confirm('Are you sure you want to deactivate ?')" class="btn btn-warning">Deactivate</a>
                          @else
                          <a href="{{route('product.activate',encrypt($item->id))}}" onclick="return confirm('Are you sure you want to activate ?')" class="btn btn-success">Activate</a>
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