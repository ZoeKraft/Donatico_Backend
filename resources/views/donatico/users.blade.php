<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Usuarios Registrados</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 text-white min-h-screen p-8 font-sans">

    <h1 class="text-4xl font-bold mb-8 text-black">Usuarios Registrados</h1>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-600 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-rounded border-gray-400 bg-white">
        <thead>
            <tr class="text-black">
                <th class="border border-gray-400 px-4 py-2 text-left">ID</th>
                <th class="border border-gray-400 px-4 py-2 text-left">Nombre</th>
                <th class="border border-gray-400 px-4 py-2 text-left">Email</th>
                <th class="border border-gray-400 px-4 py-2 text-left">Teléfono</th>
                <th class="border border-gray-400 px-4 py-2 text-left">Dirección</th>
                <th class="border border-gray-400 px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr class="text-black">
                <td class="border border-gray-400 px-4 py-2 ">{{ $user->id }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $user->phone }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $user->address }}</td>
                <td class="border border-gray-400 px-4 py-2 text-center space-x-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white font-semibold">Editar</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white font-semibold">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-4">No hay usuarios registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('register.form') }}" class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded font-bold text-white">Registrar Nuevo Usuario</a>
    </div>

</body>
</html>
