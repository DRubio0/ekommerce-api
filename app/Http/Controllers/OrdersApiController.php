<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Orders::where('user_id', '=', $user->id)->with('products')->get();

        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        
        $order = new Orders();
        $order->total = $request->total;
        $order->order_sent = 'inprogress';
        $order->user_id = $user->id;
        $order->save();

        $id = $order->id;

        $products = $request->products;

        $order_product = [];

        foreach ($products as $product) 
        {
            $order_product[] = 
            [
                'orders_id' => $id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $productUpdated = Product::findOrFail($product['id']);
            $productUpdated->stock = $productUpdated->stock - $product['quantity'];
            $productUpdated->save();
        }

        // Almacenar en la DB
        OrderProduct::insert($order_product);


        return[
            'message' => 'Order created successfull',
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
