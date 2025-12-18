<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_code' => 'required|unique:customers',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_code' => 'required|unique:customers,customer_code,' . $customer->id,
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}
