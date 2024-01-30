<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Incluez les liens vers Bootstrap CSS et les scripts Bootstrap JavaScript ici -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{asset('img/calculatrice.png')}}" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/form.css')}}" />
</head>
<body>
    
    <div class="inscription d-flex justify-content-center align-items-center">
        <form class="p-4 rounded shadow" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="d-flex justify-content-center align-items-center">
                <img style="width:200px;" class="img py-2" src="{{asset('img/logo.png')}}" alt="logo" />
            </div>
            <div class="row mb-3">
                <!-- Name -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet :</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Entrer votre nom complet">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email Address -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Entrer votre email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Registre Social and Registre Commerce in the same row -->
            <div class="row mb-3">
                <!-- Registre Social -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="rs" class="form-label">Raison Social :</label>
                        <input type="text" class="form-control" id="rs" name="rs" value="{{ old('rs') }}" required autocomplete="username" placeholder="Entrer votre registre sociale">
                        @error('rs')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Registre Commerce -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="rc" class="form-label">Registre Commerce :</label>
                        <input type="number" class="form-control" id="rc" name="rc" value="{{ old('rc') }}" required autocomplete="username" placeholder="Entrer votre registre de commerce">
                        @error('rc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- ICE and Forme Juridique in the same row -->
            <div class="row mb-3">
                <!-- ICE -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ice" class="form-label">ICE :</label>
                        <input type="number" class="form-control" id="ice" name="ice" value="{{ old('ice') }}" required autocomplete="username" placeholder="Entrer votre ice">
                        @error('ice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Forme Juridique -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fj" class="form-label">Forme Juridique :</label>
                        <select style="padding-bottom:3.5px;" class="form-control" id="fj" name="fj" required>
                            <option value="" selected disabled>Sélectionnez une forme juridique</option>
                            <option value="S A">S A</option>
                            <option value="SARL">SARL</option>
                            <option value="SARL AU">SARL AU</option>
                            <option value="Association">Association</option>
                            <option value="Cooperative">Cooperative</option>
                            <option value="Auto Entrepreneur">Auto Entrepreneur</option>
                            <!-- Ajoutez d'autres options au besoin -->
                        </select>
                        @error('fj')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Ville and Password in the same row -->
            <div class="row mb-3">
                <!-- Ville -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville :</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville') }}" required autocomplete="username" placeholder="Entrer votre ville">
                        @error('ville')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Entrer votre mot de passe">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer votre mot de passe :</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Entrer votre comfirmation de mot de passe">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success login">S'inscrire</button>
                <a href="{{ route('login') }}" class="text-decoration-none">Déjà enregistré ?</a>

            </div>
        </form>
    </div>

    <!-- Incluez les scripts Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
