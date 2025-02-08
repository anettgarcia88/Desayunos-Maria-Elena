<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function show($id)
{
    $user = User::findOrFail($id);

    return view('users.show', compact('user'));
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return response()->json($user);
}

public function update(Request $request, $id)
{
    // Validar los datos recibidos
    $validated = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'secondLastName' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$id,
    ]);

    // Buscar el usuario por ID
    $user = User::findOrFail($id);

    // Actualizar los datos
    $user->firstName = $request->input('firstName');
    $user->lastName = $request->input('lastName');
    $user->secondLastName = $request->input('secondLastName');
    $user->email = $request->input('email'); // Actualizar el correo

    // Guardar los cambios
    $user->save();

    // Responder con JSON (para AJAX)
    return response()->json(['message' => 'Usuario actualizado con éxito']);
}

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
    
    public function store(Request $request)
    {
        // Validación de los datos (asegurando que los datos que estamos recibiendo sean válidos)
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'secondLastName' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
        ]);
    
        // Crear el nuevo usuario
        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->secondLastName = $request->input('secondLastName');
        $user->email = $request->input('email');
        $user->username = $request->input('username'); // El nombre de usuario generado
        $user->password = bcrypt($request->input('password')); // Encriptar la contraseña antes de guardarla
        $user->status = 1; // Puedes asignar un valor predeterminado si es necesario
        $user->save();
    
        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }
    

}
