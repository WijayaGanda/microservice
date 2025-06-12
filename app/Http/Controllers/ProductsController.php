<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:20',
            'stock' => 'required|string|max:20',
        ]);

        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);


        return redirect()->route('products.index')->with('success', 'Product berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function showCustomersByProduct($id)
    {
        $product = Product::findOrFail($id);

        $orders = Http::get('http://nginx-order/api/orders-api')->json()['data'];
        $customers = Http::get('http://nginx-customer/api/customers-api')->json()['data'];

        $filteredOrders = collect($orders)->where('product_id', $id);

        $customersWhoBought = $filteredOrders->map(function ($order) use ($customers) {
            $customer = collect($customers)->firstWhere('id', $order['customer_id']);
            return $customer;
        });

        return view('products.customers', [
            'product' => $product,
            'customers' => $customersWhoBought
        ]);
    }
}
