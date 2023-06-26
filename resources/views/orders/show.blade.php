@extends('layouts.app')

@section('title')
    Show Order
@endsection

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="  w-auto mt-3 bg-blue-100/20 p-6 rounded-xl">
        <h1 class="font-bold uppercase text-4xl text-center mb-4 text-white">Order Details</h1>

        <div class="w-full max-w-xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <h2 class="font-bold text-xl">Order ID:</h2>
                    <p class="mx-2 text-lg font-bold text-red-800">{{ $order->id }}</p>
                    <h2 class=" ml-40 font-bold text-xl">Status:</h2>
                    <p class="mx-2 font-bold uppercase
                    @if($order->order_sent === 'completed') text-green-500
                    @elseif($order->order_sent === 'finished') text-red-500
                    @elseif($order->order_sent === 'stand-by') text-blue-500
                    @elseif($order->order_sent === 'inprogress') text-yellow-500
                    @endif">{{ $order->order_sent }}</p>
                </div>
                <div class="mb-4 flex items-center">
                    <h2 class="font-bold text-xl">Ordered by: </h2>
                    <p class=" uppercase font-bold ml-2"> {{ $order->user->name}} {{$order->user->last_name}}</p>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-2">Product</th>
                            <th class="py-2 text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td class="py-2 text-xl">{{ $product->name }}</td>
                                <td class="py-2 text-center text-xl">${{ $product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <p class="font-bold text-xl text-red-500">Total: ${{ $order->total }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('orders.index')}}" class="bg-blue-500 p-3 rounded hover:bg-blue-400 transition-colors uppercase font-bold">Return</a>
        </div>
    </div>
</div>
@endsection