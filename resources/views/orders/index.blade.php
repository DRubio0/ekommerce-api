@extends('layouts.app')

@section('title')
Orders
@endsection

@section('content')
<div class="my-12">
    <h1 class="mt-5 text-center text-xl uppercase text-white">Order View Section</h1>
    <div class="bg-blue-100/50 rounded p-3">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-xl">
                        <table class="w-full text-sm text-left text-gray-500  dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       State
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order )
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        {{$order->id}}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:text-red-500" >
                                        <a href="{{route('orders.show',$order->id)}}">
                                            ${{$order->total}}
                                        </a>
                                    </th>
                                    <td class="px-3 py-4">
                                        <span class="font-bold uppercase
                                        @if($order->order_sent === 'completed') text-green-500
                                        @elseif($order->order_sent === 'finished') text-red-500
                                        @elseif($order->order_sent === 'stand-by') text-blue-500
                                        @elseif($order->order_sent === 'inprogress') text-yellow-500
                                        @endif">
                                        {{ $order->order_sent }}
                                    </span>
                                    </td>
                                    <td class="flex items-center px-2 py-4 space-x-3">
                                        <a href="{{ '/order/' . $order->id . '/edit'}}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('orders.destroy',$order->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                type="submit"
                                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="pagination-container mt-3">
                    {{ $products->links('pagination::tailwind') }}
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="max-w-xs mx-auto">
        <a class=" my-3 flex items-center justify-center bg-white py-2 px-4 rounded-md shadow-md hover:bg-blue-300 font-bold transition-colors"
            href="">New Product</a>
    </div> --}}
</div>
@endsection