<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Incluez les liens vers Bootstrap CSS et les scripts Bootstrap JavaScript ici -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{asset('img/calculatrice.png')}}" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/form.css')}}" />
</head>
<body>
    <div class="container mt-5">
        <!-- Session Status -->
        @if(session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif
        <div class="content d-flex justify-content-center align-items-center">
             <form class="p-4 rounded shadow" method="POST" action="{{ route('login') }}">
                 <div class="d-flex justify-content-center align-items-center py-2">
                    <img style="width:200px;" src="{{asset('img/logo.png')}}" alt="logo" />
                </div>
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Entrer votre email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"  placeholder="Entrer votre mot de passe">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                </div>

                {{-- <div class="form-group">
                    @if (Route::has('password.request'))
                        <a class="text-muted" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                </div> --}}

                <button type="submit" class="btn btn-success login">Connexion</button>

                <p class="text-center pt-4">Vous n'avez pas de compte ? <a class="compte" href="/register">Créer un compte</a></p>
            </form>
        </div>
    </div>

    <!-- Incluez les scripts Bootstrap JavaScript ici -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
