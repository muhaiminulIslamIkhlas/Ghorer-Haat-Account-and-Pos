<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Styles -->
        
    </head>
    <body>
        <br>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <a href="{{URL('/admin/add/exam_set')}}" class="btn btn-primary">Admin</a>
                <br>
                <br>
                <div class="row">
                @foreach($data as $row)
                <div class="col-md-3">
                    <div class="mr-2 mb-2">
                    <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                      <div class="card-header bg-white text-left">
                        {{$row->exam_set}}
                      </div>
                      <div class="card-body">
                        
                        <p class="card-text text-danger">
                           <strong> <label>Reading</label><br></strong>
                           <strong> <label>Writing</label><br></strong>
                            <strong><label>Speaking</label><br></strong>
                            <strong><label>Listening</label><br></strong>
                        </p>
                        
                      </div>
                      <div class="card-footer bg-white">
                        <a href="{{URL('/exam/'.$row->id)}}" class="btn btn-primary ">Start Exam</a>
                      </div>
                    </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        @include('sweetalert::alert')
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
