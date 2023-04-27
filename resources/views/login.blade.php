<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>
        .parent{
            background-color:cadetblue;
            position: relative; 
            height: 837px;
            width: 100%;
        }
        .child{
            
            position: absolute;
            top: 38%;
            left: 30%;
            width: 48%;
            margin: -50px 0 0 -50px;
        }
        .card{
            background-color: rgb(141, 203, 232);
        }
    </style>
</head>
<body>
    <div class="parent">
        <div class="child">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center"><u>Login</u></h4>
                    @if (session()->has('danger'))
                        <div class="alert alert-danger">{{session('danger')}}</div>
                    @endif
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                          <label for="formGroupExampleInput">Email</label>
                          <input type="email" name="email" class="form-control" id="formGroupExampleInput">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Password</label>
                          <input type="password" name="password" class="form-control" id="formGroupExampleInput2">
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                      </form>
                </div>
              </div>
        </div>
    </div>
</body>
</html>