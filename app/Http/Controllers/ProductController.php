<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $subcategories = Subcategories::all();

        return view('products.create', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'brand' => ['required'],
            'description' => ['required'],
            'sku' => ['required'],
            'stock' => ['required'],
            'subcategory_id' => ['required'],
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'brand' => $request->brand,
            'image' => '',
            'description' => $request->description,
            'sku' => $request->sku,
            'state' => 1,
            'subcategory_id' => 1,
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
        //
    }
}