<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'role' => 'required|string|max:50',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User added successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'role' => 'required|string|max:50',
        ]);

        $data = [
            'username' => $request->username,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6',
            ]);

            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
