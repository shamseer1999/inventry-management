<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventry</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        ul {
            list-style-type: none;
            float:right;
        }
        ul li{
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-light p-3">
                <a href="{{route('dashbord')}}" class="text-dark text-decoration-none" style="font-size:25px"><b>Inventry</b></a>
                @if (auth()->user())
                        <ul><li><a href="{{route('logout')}}" class="text-decoration-none">Logout</a></li></ul>
                    @endif
                <ul class="">
                    @if (auth()->user()->role ==1)
                    <li class=""><a href="{{route('users')}}" class="text-dark text-decoration-none">Users</a></li>
                    @endif
                    
                    <li><a href="{{route('products')}}" class="text-dark text-decoration-none">Products</a></li>
                    <li><a href="{{route('categories')}}" class="text-dark text-decoration-none">Categories</a></li>
                    
                </ul>
                
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="col-md-12">
                @yield('content')
            </div>
            
        </div>
    </div>
</body>
</html>