<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                               required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Email" id="email" class="form-control"
                                               name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Password" id="password" class="form-control"
                                               name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control" name="password_confirmation" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                        <a href="{{ route('login') }}" class="login-btn">Login</a>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<style>
    body, html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(120deg, rgba(63, 94, 251, .8), rgba(106, 208, 217, .8));
        font-family: 'Roboto', sans-serif;
    }
    .signup-form {
        width: 100%;
        max-width: 500px;
        padding: 15px;
        margin: auto;
    }
    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        padding: 20px;
    }
    .card-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #0056b3;
    }
    .text-danger {
        color: red;
        font-size: 0.8em;
    }

    .login-btn {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #008F95; /* Zima Blue color */
        text-decoration: none;
    }
    .login-btn:hover {
        text-decoration: underline;
    }

</style>