<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->path();

        $products = Product::paginate(3);
        return view('products.index', [
            'products' => $products,
            'view' => $view,
        ]);
    }

    public function create(Request $request)
    {
        $view = $request->path();
        $subcategories = Subcategories::all();

        return view('products.create', [
            'subcategories' => $subcategories,
            'view' => $view
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => ['required'],
                'price' => ['required'],
                'stock' => ['required'],
                'brand' => ['required'],
                'image'=>['required', 'image'],
                'description' => ['required'],
                'sku' => ['required'],
                'subcategory_id' => ['required'],
                'state'=>['required','boolean'],
            ]
        );

        $imageName = $request->file('image')->store('img_product', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'brand' => $request->brand,
            'image' => $imageName,
            'description' => $request->description,
            'sku' => $request->sku,
            'state' => $request->state ? 1 : 0,
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('product.index');
    }

    public function show(Request $request,string $id)
    {
        $view = $request->path();
        $product = Product::findOrFail($id);
        return view(
            'products.show',
            [
                'product' => $product,
                'view'=>$view,
            ]
        );
    }

    public function edit(Request $request, string $id)
    {
        $view = $request->path();
        $subcategories = Subcategories::all();
        $product = Product::where('id', $id)->get();

        return view('products.edit', [
            'product' => $product[0],
            'subcategories' => $subcategories,
            'view'=>$view
        ]);
    }

    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'name' => ['required'],
                'price' => ['required'],
                'stock' => ['required'],
                'brand' => ['required'],
                'image'=>['required', 'image'],
                'description' => ['required'],
                'sku' => ['required'],
                'subcategory_id' => ['required'],
                'state'=>['required','boolean'],
            ]
        );

        $imageName = $request->file('image')->store('img_product', 'public');

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->brand = $request->brand;
        $product->image = $imageName;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->subcategory_id = $request->subcategory_id;
        $product->state=$request->state ? 1 : 0;

        $product->save();

        return redirect()->route('product.index');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}