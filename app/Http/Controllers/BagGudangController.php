<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BagGudang;

class BagGudangController extends Controller
{
    public function index()
    {
        $bagGudangs = BagGudang::all();
        return view('bag-gudang.index', compact('bagGudangs'));
    }

    public function create()
    {
        return view('bag-gudang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bag_gudang' => 'required|unique:bag_gudangs',
            'nama' => 'required',
            'email' => 'required|email|unique:bag_gudangs',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'password' => 'required|string|min:6',
        ]);

        BagGudang::create($request->all());

        return redirect()->route('bag-gudang.index')->with('success', 'Data Bag Gudang berhasil ditambahkan.');
    }

    public function show(BagGudang $bagGudang)
    {
        return view('bag-gudang.show', compact('bagGudang'));
    }

    public function edit(BagGudang $bagGudang)
    {
        return view('bag-gudang.edit', compact('bagGudang'));
    }

    public function update(Request $request, BagGudang $bagGudang)
    {
        $request->validate([
            'kode_bag_gudang' => 'required|unique:bag_gudangs,kode_bag_gudang,' . $bagGudang->id,
            'nama' => 'required',
            'email' => 'required|email|unique:bag_gudangs,email,' . $bagGudang->id,
            'alamat' => 'required',
            'no_telepon' => 'required',
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->all();
        // Jika password tidak diisi, jangan update password
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $bagGudang->update($data);

        return redirect()->route('bag-gudang.index')->with('success', 'Data Bag Gudang berhasil diperbarui.');
    }

    public function destroy(BagGudang $bagGudang)
    {
        $bagGudang->delete();

        return redirect()->route('bag-gudang.index')->with('success', 'Data Bag Gudang berhasil dihapus.');
    }
}
