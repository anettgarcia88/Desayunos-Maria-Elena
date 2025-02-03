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
    if (Auth::id() != $id) {
        abort(403, 'No autorizado');
    }

    $user = User::findOrFail($id);

    return view('profile.edit', compact('user'));
}

public function update(Request $request, $id)
{
    if (Auth::id() != $id) {
        abort(403, 'No autorizado');
    }

    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }
    $user->save();

    return redirect()->route('profile.edit', $user->id)->with('success', 'Perfil actualizado correctamente.');
}
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
