@extends('layouts.template')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if (auth()->user()->role ==1)
                <div class="col-md-4">
                    <div class="card bg-light" style="width: 18rem;">
                       
                        <div class="card-body">
                            <h3 class="card-text">{{$users}}</h3>
                          <h5 class="card-title">Users</h5>
                          
                          <a href="{{route('users')}}" class="btn btn-primary">Users</a>
                        </div>
                      </div>
                </div>
                @endif
                <div class="col-md-4">
                    <div class="card bg-light" style="width: 18rem;">
                       
                        <div class="card-body">
                            <h3 class="card-text">{{$products}}</h3>
                          <h5 class="card-title">Products</h5>
                          
                          <a href="{{route('products')}}" class="btn btn-primary">Products</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection