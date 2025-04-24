<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\productResource;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Dotenv\Validator;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return new productResource($products, "success", "list of product");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return new productResource(null, 'Failed', $validator->errors());
        }

        $product = Product::create($request->all());
        return new productResource($product, 'Success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->all());
            return new productResource($product, 'Success', 'Product Showed Successfully');
        } else {
            return new productResource(null, 'Failed', 'Product Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return new productResource(null, 'Failed', $validator->errors());
        }

        $product = Product::find($id);
        if ($product) {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            return new productResource($product, "Success", "Product Edited Successfully");
        } else {
            return new productResource(null, "Failed", "Product Not Found");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return new productResource(true, "Success", "Product Deleted Successfully");
        } else {
            return new productResource(null, "Failed", "product Not Found");
        }
    }
}
