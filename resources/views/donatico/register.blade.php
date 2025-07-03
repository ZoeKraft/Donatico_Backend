<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Usuario</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fredoka:400,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-green-900 flex justify-center items-center p-6 min-h-screen font-fredoka">

    <div class="flex flex-col items-center w-full max-w-md">
        <h1 class="text-4xl font-bold mb-8">Registrarse</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-6 rounded w-full text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="w-full flex flex-col gap-5">
            @csrf

            <div>
                <label class="font-semibold block">Nombre</label>
                <input name="name" type="text" value="{{ old('name') }}"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300 @error('name') border-red-500 @enderror" required />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold block">Correo electrónico</label>
                <input name="email" type="email" value="{{ old('email') }}"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300 @error('email') border-red-500 @enderror" required />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold block">Teléfono</label>
                <input name="phone" type="tel" value="{{ old('phone') }}"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300 @error('phone') border-red-500 @enderror" required />
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold block">Dirección</label>
                <input name="address" type="text" value="{{ old('address') }}"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300 @error('address') border-red-500 @enderror" required />
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold block">Contraseña</label>
                <input name="password" type="password"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300 @error('password') border-red-500 @enderror" required />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold block">Confirmar contraseña</label>
                <input name="password_confirmation" type="password"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" required />
            </div>

            <button type="submit" class="bg-green-600 text-white font-bold py-2 rounded hover:bg-green-700 transition-all">
                Registrarse
            </button>
        </form>

        <p class="text-sm mt-4">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="font-semibold underline underline-offset-4 hover:text-green-700">Inicia sesión aquí</a>
        </p>
    </div>
</body>
</html>
