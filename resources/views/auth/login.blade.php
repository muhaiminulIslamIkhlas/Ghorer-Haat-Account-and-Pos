<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Josefin Sans', sans-serif;
        }

        .main_div{
            width: 100%;
            height: 100vh;
            position: relative;
        }


        .box{
            width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 50px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
        }

        .box h1 {
            margin-bottom: 30px;
            color: #fff;
            text-align: center;
            text-transform: capitalize;
        }


        .box .inputBox input{
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            letter-spacing: 1px;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            font-weight: bold;
        }

        .box .inputBox{
            position: relative;
        }

        .box .inputBox label{
            position: absolute;
            top: 0;
            left: 0;
            letter-spacing: 1px;
            color: #fff;
            padding: 10px 0;
            transition: 0.8s;
        }

        .box .inputBox input:focus ~ label,
        .box .inputBox input:valid ~ label{
            top: -20px;
            left: 0;
            color: #03a9f4;
            font-size: 16px;
            
        }

        .box input[type="submit"]{
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            background: #03a9f4;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .box input[type="submit"]:hover{
            background: white;
            color: black;
            font-size: 16px;
            
            
        }
    </style>
</head>
<body>
    <div class="main_div">
        <div class="box">
            <h1>login form</h1>
             <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="inputBox">
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="">Email</label>
                     @error('email')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="inputBox">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="">Password</label>

                                @error('password')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
               
                <input type="submit" value="login">
            </form>
        </div>
    </div>
</body>
</html>