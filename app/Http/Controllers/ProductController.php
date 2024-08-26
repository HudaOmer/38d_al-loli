<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:ring,necklace,earring,bracelet,home-accessories,head-accessories',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Display the specified resource.
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified resource.
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'category' => 'sometimes|required|in:ring,necklace,earring,bracelet,home-accessories,head-accessories',
            'stock_quantity' => 'sometimes|required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Display a listing of products by category.
     *
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function indexByCategory(string $category)
    {
        $categories = ['ring', 'necklace', 'earring', 'bracelet', 'home-accessories', 'head-accessories'];
        if (!in_array($category, $categories)) {
            abort(404, 'Category not found');
        }
        $products = Product::where('category', $category)->get();
        return view('products.index-by-category', ['products' => $products]);
    }
}

