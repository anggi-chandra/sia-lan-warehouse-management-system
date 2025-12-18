<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index()
    {
        $produksis = Produksi::with('pesanan.customer')->latest()->paginate(10);
        $pesanans = Transaction::with('customer:id,name')
            ->select('id', 'transaction_code', 'customer_id')
            ->latest()
            ->get();
            
        return view('produksi.index', compact('produksis', 'pesanans'));
    }

    public function create()
    {
        $pesanans = Transaction::with('customer')->get();
        return view('produksi.create', compact('pesanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produksi' => 'required|string|max:255|unique:productions',
            'pesanan_id' => 'nullable|exists:transactions,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jumlah' => 'required|string|max:255',
            'status' => 'required|in:Selesai,Proses,Pending',
        ]);

        Produksi::create($request->all());

        return redirect()->route('produksi.index')
            ->with('success', 'Produksi berhasil ditambahkan.');
    }

    public function show(Produksi $produksi)
    {
        $produksi->load('pesanan.customer');
        return view('produksi.show', compact('produksi'));
    }

    public function edit(Produksi $produksi)
    {
        $pesanans = Transaction::with('customer')->get();
        return view('produksi.edit', compact('produksi', 'pesanans'));
    }

    public function update(Request $request, Produksi $produksi)
    {
        $request->validate([
            'kode_produksi' => 'required|string|max:255|unique:productions,kode_produksi,' . $produksi->id,
            'pesanan_id' => 'nullable|exists:transactions,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jumlah' => 'required|string|max:255',
            'status' => 'required|in:Selesai,Proses,Pending',
        ]);

        $produksi->update($request->all());

        return redirect()->route('produksi.index')
            ->with('success', 'Produksi berhasil diperbarui.');
    }

    public function destroy(Produksi $produksi)
    {
        $produksi->delete();

        return redirect()->route('produksi.index')
            ->with('success', 'Produksi berhasil dihapus.');
    }
}
