<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://fonts.bunny.net/css?family=fredoka:400,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-green-900 min-h-screen flex items-center justify-center p-6 font-fredoka">

    <div class="w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6">Editar Usuario</h1>

        <form method="POST" action="{{ route('users.update', $user->id) }}" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div>
                <label class="font-semibold block">Nombre</label>
                <input name="name" type="text" value="{{ old('name', $user->name) }}" required
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" />
            </div>

            <div>
                <label class="font-semibold block">Correo electrónico</label>
                <input name="email" type="email" value="{{ old('email', $user->email) }}" required
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" />
            </div>

            <div>
                <label class="font-semibold block">Teléfono</label>
                <input name="phone" type="tel" value="{{ old('phone', $user->phone) }}" required
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" />
            </div>

            <div>
                <label class="font-semibold block">Dirección</label>
                <input name="address" type="text" value="{{ old('address', $user->address) }}" required
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" />
            </div>

            <div>
                <label class="font-semibold block">Nueva contraseña (opcional)</label>
                <input name="password" type="password"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" />
            </div>

            <div>
                <label class="font-semibold block">Confirmar nueva contraseña</label>
                <input name="password_confirmation" type="password"
                    class="w-full border-b-2 px-4 py-2 focus:outline-none hover:scale-105 duration-300" />
            </div>

            <button type="submit"
                class="bg-green-600 text-white font-bold py-2 rounded hover:bg-green-700 transition-all">
                Actualizar
            </button>
        </form>

        <div class="mt-4">
            <a href="{{ route('users.index') }}"
               class="text-green-700 underline hover:text-green-900 text-sm">← Volver a la lista de usuarios</a>
        </div>
    </div>

</body>
</html>
