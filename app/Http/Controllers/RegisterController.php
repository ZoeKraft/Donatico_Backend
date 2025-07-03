<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Mostrar listado de usuarios.
     */
    public function index()
    {
        $users = User::all();
        return view('donatico.users', compact('users'));
    }

    /**
     * Mostrar formulario para crear un nuevo usuario.
     */
    public function create()
    {
       return view('donatico.register');
    }

    /**
     * Guardar un nuevo usuario.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'required|string|max:20',
            'address'               => 'required|string|max:255',
            'password'              => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario registrado exitosamente.');
    }

    /**
     * Mostrar un usuario específico (opcional).
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Mostrar formulario para editar un usuario.
     */
   public function edit(User $user)
    {
    return view('donatico.editUser', compact('user'));
   }
    // Actualizar usuario
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Actualizar password solo si fue enviado
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}