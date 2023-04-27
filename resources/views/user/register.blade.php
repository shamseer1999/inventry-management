@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
      Register User
    </div>
    <div class="card-body">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form action="" method="post" onsubmit=" return check()">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required value="{{old('name')}}">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required value="{{old('email')}}">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Phone</label>
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone" required value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="1" {{old('role') ==1 ? 'selected' :''}}>Admin</option>
                    <option value="2" {{old('role') ==2 ? 'selected' :''}}>User</option>
                    <option value="3" {{old('role') ==3 ? 'selected' :''}}>Agents</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" required class="form-control" required>
            </div>
            <div class="form-group mt-1">
                <input type="submit" class="btn btn-primary"  value="Add User">
            </div>
          </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  <script>
    function check()
    {
        var phoneRegex = /^\d{10}$/;

        var phone = $('#phone').val();

        if($.isNumeric(phone))
        {
            if (!phoneRegex.test(phone)) {
                
                alert('Enter valid phone number');
                return false;
            }
        }else{
            
            alert('Phone number only accept numbers');
            return false;
        }
        
    }
  </script>
@endsection