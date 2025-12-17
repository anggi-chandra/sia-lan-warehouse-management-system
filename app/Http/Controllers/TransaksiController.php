<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    public function index(): View
    {
        $transactions = Transaction::with('customer')->get();
        return view('transaksi.index', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('transaksi.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_code' => 'required|string|max:255|unique:transactions',
            'customer_id' => 'required|exists:customers,id',
            'admin_name' => 'required|string|max:255',
            'jenis_pesanan' => 'nullable|string|max:255',
            'jenis_payment' => 'nullable|string|max:255',
            'nominal_dp' => 'nullable|numeric|min:0',
            'status_pelunasan' => 'nullable|string|max:255',
            'date' => 'required|date',
            'total' => 'required|numeric|min:0',
            'jumlah_pesanan' => 'nullable|string|max:255',
            'nama_barang' => 'nullable|string|max:255',
            'harga_pesanan' => 'nullable|numeric|min:0',
            'status' => 'required|in:Selesai,Proses,Pending',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show(Transaction $transaksi)
    {
        $transaksi->load('customer');
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaction $transaksi)
    {
        $customers = Customer::all();
        return view('transaksi.edit', compact('transaksi', 'customers'));
    }

    public function update(Request $request, Transaction $transaksi)
    {
        $request->validate([
            'transaction_code' => 'required|string|max:255|unique:transactions,transaction_code,' . $transaksi->id,
            'customer_id' => 'required|exists:customers,id',
            'admin_name' => 'required|string|max:255',
            'jenis_pesanan' => 'nullable|string|max:255',
            'jenis_payment' => 'nullable|string|max:255',
            'nominal_dp' => 'nullable|numeric|min:0',
            'status_pelunasan' => 'nullable|string|max:255',
            'date' => 'required|date',
            'total' => 'required|numeric|min:0',
            'jumlah_pesanan' => 'nullable|string|max:255',
            'nama_barang' => 'nullable|string|max:255',
            'harga_pesanan' => 'nullable|numeric|min:0',
            'status' => 'required|in:Selesai,Proses,Pending',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
