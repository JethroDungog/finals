<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        // Search functionality
        $query = $request->input('search');
        $products = Product::when($query, function ($q) use ($query) {
            return $q->where('name', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%');
        })->latest()->get();

        return view('dashboard', [
            'products' => $products,
        ]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'quantity' => 'required|numeric',
            'description' => 'required|min:5',
            'price' => 'required|numeric',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'quantity' => 'required|numeric',
            'description' => 'required|min:5',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
