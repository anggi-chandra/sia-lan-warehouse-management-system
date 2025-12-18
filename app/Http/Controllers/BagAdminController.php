<?php

namespace App\Http\Controllers;

use App\Models\BagAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class BagAdminController extends Controller
{
    public function index(): View
    {
        $bagAdmins = BagAdmin::with('user')->latest()->paginate(10);
        return view('bag-admin.index', compact('bagAdmins'));
    }

    public function create()
    {
        return view('bag-admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_admin' => 'required|string|max:255|unique:bag_admins',
            'nama_admin' => 'required|string|max:255',
            'email' => 'required|email|unique:bag_admins|unique:users',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Create user account
        $user = User::create([
            'name' => $request->nama_admin,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create bag admin
        $bagAdmin = BagAdmin::create([
            'kode_admin' => $request->kode_admin,
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'user_id' => $user->id,
        ]);

        return redirect()->route('bag-admin.index')
            ->with('success', 'Bag Admin berhasil ditambahkan dan akun user telah dibuat.');
    }

    public function show(BagAdmin $bagAdmin)
    {
        $bagAdmin->load('user');
        return view('bag-admin.show', compact('bagAdmin'));
    }

    public function edit(BagAdmin $bagAdmin)
    {
        $bagAdmin->load('user');
        return view('bag-admin.edit', compact('bagAdmin'));
    }

    public function update(Request $request, BagAdmin $bagAdmin)
    {
        $request->validate([
            'kode_admin' => 'required|string|max:255|unique:bag_admins,kode_admin,' . $bagAdmin->id,
            'nama_admin' => 'required|string|max:255',
            'email' => 'required|email|unique:bag_admins,email,' . $bagAdmin->id . '|unique:users,email,' . $bagAdmin->user_id,
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        // Update bag admin
        $bagAdmin->update([
            'kode_admin' => $request->kode_admin,
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        // Update user account
        $userData = [
            'name' => $request->nama_admin,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        if ($bagAdmin->user) {
            $bagAdmin->user->update($userData);
        }

        return redirect()->route('bag-admin.index')
            ->with('success', 'Bag Admin berhasil diperbarui.');
    }

    public function destroy(BagAdmin $bagAdmin)
    {
        // Delete user account if exists
        if ($bagAdmin->user) {
            $bagAdmin->user->delete();
        }

        // Delete bag admin
        $bagAdmin->delete();

        return redirect()->route('bag-admin.index')
            ->with('success', 'Bag Admin dan akun user berhasil dihapus.');
    }
}
