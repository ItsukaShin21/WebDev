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

    <h3>LOGIN</h3>

    <form method="POST">
        @csrf
        <label>Username :
            <input type="text" name="name" id="name" required>
        </label>
    
        <label>Password :
            <input type="password" name="password" id="password" required>
        </label>
    
        <input type="submit" name="loginBtn" id="loginBtn" value="LOGIN">
        <a href="{{route('portfolio')}}">GO BACK</a>
    </form>
</body>
</html>