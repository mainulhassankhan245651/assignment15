<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Get all products from the database
        $products = Product::all();

        // Return the view with the products data
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        // Display the form to create a new product
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the input data from the form
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add more validation rules for other fields if needed
        ]);

        // Create a new product with the validated data
        $product = Product::create($validatedData);

        // Redirect to the product's details page or any other appropriate route
        return redirect()->route('products.show', ['product' => $product->id]);
    }

    public function edit($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Display the form to edit an existing product
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Validate the input data from the form
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add more validation rules for other fields if needed
        ]);

        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Update the product with the validated data
        $product->update($validatedData);

        // Redirect to the product's details page or any other appropriate route
        return redirect()->route('products.show', ['product' => $product->id]);
    }

    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect to the product listing or any other appropriate route
        return redirect()->route('products.index');
    }
}

