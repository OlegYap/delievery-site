{{--
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
--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/resources/css/style.css">
    <script src="/resources/js/script.js" defer></script>
</head>
<body>
<article class="container">
    <div class="block">
        <section class="block_item block-item">
            <h2 class="block_item_title">У вас уже есть аккаунт?</h2>
            <button class="block-item_btn signin-btn">Войти</button>
        </section>
        <section class="block_item block-item">
            <h2 class="block_item_title">У вас нет аккаунта</h2>
            <button class="block-item_btn signup-btn">Зарегистрироваться</button>
        </section>
    </div>

    <div class="form-box active">
        <form action="{{ route('login') }}" class="form form_signin" method="POST">
            @csrf
            <h3 class="form_title">Вход</h3>
            <p>
                <input type="text" placeholder="Email" id="email" class="form_input" name="email"
                       required autofocus>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <input type="password" placeholder="Password" id="password" class="form_input"
                       name="password" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <button class="form_btn">Войти</button>
            </p>
        </form>

        <form action="{{ route('register') }}" class="form form_signup" method="POST">
            @csrf
            <h3 class="form_title">Регистрация</h3>

            <p>
                <input type="text" placeholder="Name" id="name" class="form_input" name="name"
                       required autofocus>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <input type="text" placeholder="Email" id="email" class="form_input" name="email" required autofocus>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <input type="password" placeholder="Password" id="password" class="form_input"
                       name="password" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form_input" name="password_confirmation" required>
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <button class="form_btn form_btn_signup">Зарегистрироваться</button>
            </p>
        </form>
    </div>

</article>
</body>
</html>

<script>
    const signInButton = document.querySelector('.signin-btn');
    const signUpButton = document.querySelector('.signup-btn');
    const formBox = document.querySelector('.form-box');
    const body = document.body;

    signUpButton.addEventListener('click', function () {
        formBox.classList.add('active');
        body.classList.add('active');
    })
    signInButton.addEventListener('click', function () {
        formBox.classList.remove('active');
        body.classList.remove('active');
    })

</script>

<style>
    * {
        box-sizing: border-box;
    }

    body{
        font-family: 'Poppins',sans-serif;
        margin: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

        background-color: #03a9f4;
        transition: 0.5s;
    }

    body.active {
        background-color: red;
    }

    .container {
        width: 800px;
        height: 500px;
        padding: 40px 0;
        position: relative;
    }

    .block {
        height: 100%;
        background-color: rgba(255,255,255,0.2);
        box-shadow: 0 3px 45px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
    }

    .block-item {
        text-align: center;
        width: 50%;
    }

    .block_item_title {
        font-size: 1.2rem;
        font-weight: 500;
        color: white;
        margin-bottom: 10px;
    }

    .block-item_btn {
        border: none;
        cursor: pointer;
        padding: 10px 20px;
        background-color: #fff;
        color: #1a202c;
        font-size: 16px;
        font-weight: 500;
    }

    .form-box {
        background-color: white;
        height: 100%;
        width: 50%;
        box-shadow: 0 5px 45px rgba(0,0,0,0.25);

        position: absolute;
        top: 0;
        left: 0;
        z-index: 1000;

        transition: 0.5s ease-in-out;

        display: flex;
        align-items: center;

        overflow: hidden;
    }
    .form-box.active {
        left: 50%;
    }

    .form {
        width: 100%;
        padding: 50px;
        font-size: 16px;

        position: absolute;

        transition: 0.5s;
    }

    .form_signin {
        left: 0;
        transition-delay: 0.25s;
    }

    .form_signup {
        left: 100%;
        transition-delay: 0s;
    }

    .form-box.active .form_signin {
        left: -100%;
        transition-delay: 0.25s;
    }

    .form-box.active .form_signup {
        left: 0;
        transition-delay: 0.25s;
    }


    .form_title {
        font-size: 1.5rem;
        font-weight: 500;
        color: #333;
    }

    .form_input {
        width: 100%;
        padding: 10px;
        border: solid 1px #333;
        font-size: inherit;
    }

    .form_btn {
        border: none;
        cursor: pointer;
        font-size: inherit;
        background-color: #03a9f4;
        color: #ffffff;
        padding: 10px 50px;
    }

    .form_btn_signup {
        background-color: red;
    }
</style>

