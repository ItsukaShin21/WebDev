<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/loginPage.css') }}">
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <title>Login</title>
</head>
<body>    
    @if(isset($error))
    <p class="error-message">{{ $error }}</p>
    @endif

    <div class="loginContainer">
        <form method="POST">
            @csrf
        <div class="form-group">
            <p>Username :</p>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <p>Password :</p>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <input type="submit" name="loginBtn" id="loginBtn" value="LOGIN">
            <a href="{{route('portfolio')}}">BACK</a>
        </div>
        </form>
    </div>

    <img class="webBg" src="{{ asset('images/darksnow.jpg')}}" alt="webBg">
</body>
</html>