@extends('layouts.app')

@section('title')
    Update Order
@endsection

@section('content')
    <div class="my-12">
        <h1 class="mt-5 text-center text-xl uppercase text-white">Update Order</h1>
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
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="w-4 p-4">
                                            {{ $order->id }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:text-red-500">
                                            ${{ $order->total }}
                                        </th>
                                        <td class="px-3 py-4">
                                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="order_sent" id="order_sent" class=" w-1/2 border border-gray-300 rounded p-1
                                               

                                                ">
                                                    <option value="completed" {{ $order->order_sent === 'completed' ? 'selected' : '' }}>
                                                        Completed
                                                    </option>
                                                    <option value="finished" {{ $order->order_sent === 'finished' ? 'selected' : '' }}>
                                                        Finished
                                                    </option>
                                                    <option value="stand-by" {{ $order->order_sent === 'stand-by' ? 'selected' : '' }}>
                                                        Stand-by
                                                    </option>
                                                    <option value="inprogress" {{ $order->order_sent === 'inprogress' ? 'selected' : '' }}>
                                                        In Progress
                                                    </option>
                                                </select>
                                                <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Update State
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    DELETE
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="max-w-xs mx-auto">
                                <a class=" my-3 flex items-center justify-center bg-red-400 py-2 px-4 rounded-md shadow-md hover:bg-red-500 font-bold transition-colors hover:text-white"
                                href="{{ route('orders.index')}}">Cancel</a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
