<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="logo-container">
        <h1>Tech Horizons</h1>
    </div>
    <div class=form-wrapper>
    <div class="register-container">
        <h1>Subscription</h1>

        <!-- Affichage des erreurs générales -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire d'inscription -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Champ Nom -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Champ Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Champ Mot de passe -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Champ Confirmation du mot de passe -->
            <div class="form-group">
                <label for="password_confirmation">Confirme Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <!-- Bouton d'inscription -->
            <div class="form-group">
                <button type="submit">Sign up</button>
            </div>
        </form>

        <!-- Lien vers la page de connexion -->
        <p>Already Registered ? <a href="/access">Sign in</a></p>
    </div>
    </div>
</body>
</html>