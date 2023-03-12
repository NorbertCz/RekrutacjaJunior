<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function create(CreateCustomerRequest $request)
    {
    $customer = new Customer;
    $customer->first_name = $request->input('first_name');
    $customer->last_name = $request->input('last_name');
    $customer->email = $request->input('email');
    $customer->save();
    return response()->json($customer);
    }
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());
        return response()->json($customer, 201);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(null, 204);
    }
}
