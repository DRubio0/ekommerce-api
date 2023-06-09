<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        $role = $user->role->name;

        $products = Product::paginate(6);
        return view('products.index', [
            'products' => $products,
            'name' => $name,
            'role' => $role,
        ]);
    }

    public function create(Request $request)
    {
        $subcategories = Subcategories::all();

        return view('products.create', [
            'subcategories' => $subcategories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => ['required'],
                'price' => ['required', 'max:99999.99', 'decimal:0,2', 'min:0'],
                'stock' => ['required'],
                'brand' => ['required'],
                'image'=>['required', 'image'],
                'description' => ['required'],
                'sku' => ['required'],
                'subcategory_id' => ['required'],
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
            'state' => 1,
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('product.index');
    }

    public function show(Request $request,string $id)
    {

        $product = Product::findOrFail($id);
        return view(
            'products.show',
            [
                'product' => $product
            ]
        );
    }

    public function edit(Request $request, string $id)
    {
        $subcategories = Subcategories::all();
        $product = Product::where('id', $id)->get();

        return view('products.edit', [
            'product' => $product[0],
            'subcategories' => $subcategories
        ]);
    }

    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'name' => ['required'],
                'price' => ['required', 'max:99999.99', 'decimal:0,2', 'min:0'],
                'stock' => ['required'],
                'brand' => ['required'],
                'description' => ['required'],
                'sku' => ['required'],
                'subcategory_id' => ['required'],
            ]
        );

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->brand = $request->brand;  
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->subcategory_id = $request->subcategory_id;

        if($request->file('image'))
        {
            Storage::disk('public')->delete($product->image);
            $imageName = $request->file('image')->store('img_product', 'public');
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('product.index');
    }

    public function updateState(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->state= !$product->state;

        $product->save();

        return redirect()->route('dashboard');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}