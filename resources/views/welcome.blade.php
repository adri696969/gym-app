<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gym App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/pesa.png') }}" type="image/png">

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-2xl p-10 max-w-md w-full text-center">

        {{-- IMAGEN --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/pesa.png') }}" alt="Pesa"
                 class="w-24 h-24 object-contain" width="150px" height="150px">
        </div>

        {{-- TITULO --}}
        <h1 class="text-3xl font-bold mb-3">
            Bienvenido a Gym App
        </h1>

        {{-- TEXTO --}}
        <p class="text-gray-600 mb-6">
            La teva plataforma per gestionar rutines, exercicis i progressos d'entrenament
            
            <br>

            Entrena millor, organitza les teves rutines i assoleix els teus objectius!
        </p>

        {{-- BOTONES --}}
        <div style="display:flex; flex-direction:column; gap:10px; align-items:center;">

            <a href="{{ route('login') }}"
            style="display:inline-block; background:#1e3a8a; color:white; padding:10px 20px; border-radius:8px; width:120px; text-align:center;">
                Login
            </a>

            <a href="{{ route('register') }}"
            style="display:inline-block; background:#1f2937; color:white; padding:10px 20px; border-radius:8px; width:120px; text-align:center; margin-bottom: 20px;">
                Register
            </a>

        </div>

    </div>

</body>
</html>