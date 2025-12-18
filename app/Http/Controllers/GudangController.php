<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gudang;

class GudangController extends Controller
{
    public function index()
    {
        $gudangs = Gudang::latest()->paginate(10);
        return view('gudang.index', compact('gudangs'));
    }

    public function create()
    {
        return view('gudang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gudang' => 'required|string|max:255|unique:gudangs',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|numeric|min:0',
        ]);

        Gudang::create($request->all());

        return redirect()->route('gudang.index')
            ->with('success', 'Gudang berhasil ditambahkan.');
    }

    public function show(Gudang $gudang)
    {
        return view('gudang.show', compact('gudang'));
    }

    public function edit(Gudang $gudang)
    {
        return view('gudang.edit', compact('gudang'));
    }

    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'kode_gudang' => 'required|string|max:255|unique:gudangs,kode_gudang,' . $gudang->id,
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|numeric|min:0',
        ]);

        $gudang->update($request->all());

        return redirect()->route('gudang.index')
            ->with('success', 'Gudang berhasil diperbarui.');
    }

    public function destroy(Gudang $gudang)
    {
        $gudang->delete();

        return redirect()->route('gudang.index')
            ->with('success', 'Gudang berhasil dihapus.');
    }
}
