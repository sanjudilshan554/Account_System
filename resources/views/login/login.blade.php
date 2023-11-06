<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="">
    <div class="loginText">
        <h1 class="display-4">Login</h1>
    </div>

    <div class="bodySetup loginSetup">
        <div class="card cardSetup">
            <form action="postLogin" method="post">
                @csrf
                <div class="">
                    <div class="">
                        <label for=""><b>Username:</b></label>
                        <input type="text" placeholder="Username" class="form-control" name="username" required>
                    </div>
                    <div class="pt-2">
                        <label for=""><b>Password:</b></label>
                        <input type="password" placeholder="Password" class="form-control" name="password" required>
                    </div>
                    <div class="pt-4 loginButton">
                        <input type="submit" value="login" class="btn btn-primary">
                    </div>
                    <div class="dontAcc">
                        <span>don't have an account? <a href="{{route('userRegistration')}}">Sing up</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>