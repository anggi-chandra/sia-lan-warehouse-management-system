<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengirim;
use App\Models\Transaction;

class PengirimController extends Controller
{
    public function index()
    {
        $pengirims = Pengirim::with('pesanan.customer')->get();
        return view('pengirim.index', compact('pengirims'));
    }

    public function create()
    {
        $pesanans = Transaction::with('customer')->get();
        return view('pengirim.create', compact('pesanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pengirim' => 'required|string|max:255|unique:pengirims',
            'pesanan_id' => 'nullable|exists:transactions,id',
            'nama_pengirim' => 'required|string|max:255',
            'status_pengiriman' => 'required|in:Terkirim,Dalam Perjalanan,Menunggu',
            'tanggal_pengiriman' => 'required|date',
        ]);

        Pengirim::create($request->all());

        return redirect()->route('pengirim.index')
            ->with('success', 'Pengirim berhasil ditambahkan.');
    }

    public function show(Pengirim $pengirim)
    {
        $pengirim->load('pesanan.customer');
        return view('pengirim.show', compact('pengirim'));
    }

    public function edit(Pengirim $pengirim)
    {
        $pesanans = Transaction::with('customer')->get();
        return view('pengirim.edit', compact('pengirim', 'pesanans'));
    }

    public function update(Request $request, Pengirim $pengirim)
    {
        $request->validate([
            'kode_pengirim' => 'required|string|max:255|unique:pengirims,kode_pengirim,' . $pengirim->id,
            'pesanan_id' => 'nullable|exists:transactions,id',
            'nama_pengirim' => 'required|string|max:255',
            'status_pengiriman' => 'required|in:Terkirim,Dalam Perjalanan,Menunggu',
            'tanggal_pengiriman' => 'required|date',
        ]);

        $pengirim->update($request->all());

        return redirect()->route('pengirim.index')
            ->with('success', 'Pengirim berhasil diperbarui.');
    }

    public function destroy(Pengirim $pengirim)
    {
        $pengirim->delete();

        return redirect()->route('pengirim.index')
            ->with('success', 'Pengirim berhasil dihapus.');
    }
}
