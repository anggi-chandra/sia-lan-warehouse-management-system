<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persediaan;
use App\Models\Gudang;
use App\Models\BagGudang;


class PersediaanController extends Controller
{
    public function index()
    {
        $persediaans = Persediaan::with(['gudang', 'bagGudang'])->get();
        return view('persediaan.index', compact('persediaans'));
    }

    public function create()
    {
        $gudangs = Gudang::all();
        $bagGudangs = BagGudang::all();
        return view('persediaan.create', compact('gudangs', 'bagGudangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_persediaan' => 'required|unique:persediaans',
            'gudang_id' => 'required|exists:gudangs,id',
            'bag_gudang_id' => 'required|exists:bag_gudangs,id',
            'nama_barang' => 'required',
            'stok' => 'required',
            'status' => 'required',
        ]);

        Persediaan::create($request->all());

        return redirect()->route('persediaan.index')->with('success', 'Data Persediaan berhasil ditambahkan.');
    }

    public function show(Persediaan $persediaan)
    {
        $persediaan->load(['gudang', 'bagGudang']);
        return view('persediaan.show', compact('persediaan'));
    }

    public function edit(Persediaan $persediaan)
    {
        $gudangs = Gudang::all();
        $bagGudangs = BagGudang::all();
        return view('persediaan.edit', compact('persediaan', 'gudangs', 'bagGudangs'));
    }

    public function update(Request $request, Persediaan $persediaan)
    {
        $request->validate([
            'kode_persediaan' => 'required|unique:persediaans,kode_persediaan,' . $persediaan->id,
            'gudang_id' => 'required|exists:gudangs,id',
            'bag_gudang_id' => 'required|exists:bag_gudangs,id',
            'nama_barang' => 'required',
            'stok' => 'required',
            'status' => 'required',
        ]);

        $persediaan->update($request->all());

        return redirect()->route('persediaan.index')->with('success', 'Data Persediaan berhasil diperbarui.');
    }

    public function destroy(Persediaan $persediaan)
    {
        $persediaan->delete();

        return redirect()->route('persediaan.index')->with('success', 'Data Persediaan berhasil dihapus.');
    }
}
