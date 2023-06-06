<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Product;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_api()
    {
        $products = Product::all();
        return $products;

    }
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
        ]);
        // return $products;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategories::all();

        return view('products.create', [
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => ['required'],
                'price' => ['required'],
                'stock' => ['required'],
                'brand' => ['required'],
                'image'=>['image'],
                'description' => ['required'],
                'sku' => ['required'],
                'subcategory_id' => ['required'],
            ]
        );


        $imagePath = $request->file('image')->store('public/img/');
        $imageName = basename($imagePath);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('img', $imageName, 'public');
            } else {
                $imageName = '';
            }
            //? se estara guardando un nombre o la ruta del elemento para poder acceder a el desde la version del cliente
       $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'brand' => $request->brand,
            'image' => $imageName,
            // 'image' => $imageUrl,
            'description' => $request->description,
            'sku' => $request->sku,
            'state' => 1,
            'subcategory_id' => $request->subcategory_id,
        ]);

        $product->image_url = asset('img/' . $imageName);
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
            'brand' => $product->brand,
            'image_url' => $product->image_url,
            'description' => $product->description,
            'sku' => $product->sku,
            'subcategory_id' => $product->subcategory->name,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategories = Subcategories::all();
        $product = Product::where('id',$id)->get();

        // dd($product);

        return view('products.edit', [
            'product'=>$product[0],
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $this->validate(
            $request,
            [
                'name' => ['required'],
                'price' => ['required'],
                'stock' => ['required'],
                'brand' => ['required'],
                // 'image'=>[''],
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
        // $product->image = $request->image;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->subcategory_id = $request->subcategory_id;

        $product->save();

        return redirect()->route('product.index');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
      

    }
}