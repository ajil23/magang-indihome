<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'sales')->paginate(10);
        return view('admin.management.user.index', compact('user'));
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => 'sales',
        ]);
        return redirect()->route('user.index')->with('success', 'Sales successfully created.');
    }

    public function update(Request $request, $id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Update data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');

        // Periksa jika password diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save(); // Simpan perubahan

        return redirect()->route('user.index')->with('success', 'Sales successfully updated.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Sales successfully deleted.');
    }
}
