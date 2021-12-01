<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avanzer</title>

    <!-- Font Icon -->
    <script src="https://kit.fontawesome.com/31837ac296.js" crossorigin="anonymous"></script>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
    <!-- Icono -->
    <link rel="shortcut icon" href="{{ asset('./assets/img/favicon.ico') }}">
</head>
<body>

    <div class="main">



        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('./assets/img/logo1.png') }}" alt="sing up image"></figure>
                        @if (Route::has('password.request'))
                            <a class="signup-image-link" href="{{ route('password.request') }}">{{ __('Recuperar Contraseña') }}</a>
                        @endif
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Iniciar Sesión</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="fas fa-user"></i></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Tu Correo">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-unlock-alt"></i></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Tu Contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Ingresar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


