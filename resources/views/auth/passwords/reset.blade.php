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


            <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('./assets/img/logo1.png') }}" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Restablecer Contraseña</h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="form-group">
                           <label for="email"><i class="fas fa-user"></i></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group">
                         <label for="password"><i class="fas fa-unlock-alt"></i></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Nueva Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                           <label for="password"><i class="fas fa-unlock-alt"></i></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma tu Contraseña">
                            </div>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Restablecer Contraseña"/>
                        </div>

                    </form>

                </div>
            </div>
            </section>
        
    </div>


