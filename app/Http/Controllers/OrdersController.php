<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        $role = $user->role->name;
        $view = $request->path();

        $orders = Orders::paginate(6);
        return view('orders.index', [
            'orders' => $orders,
            'view' => $view,
            'name' => $name,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Orders::findOrFail($id);

    return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $order = Orders::find($id);
        return view('orders.update', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Orders::find($id);

        $newState = strtolower(trim($request->input('order_sent')));
        $allowStates = ['completed', 'finished', 'stand-by', 'inprogress'];
        if (!in_array($newState, $allowStates)) {
            return redirect()->back()->withErrors('Invalid state provided.');
        }


        $order->order_sent = $newState;
        $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index');
    }
}