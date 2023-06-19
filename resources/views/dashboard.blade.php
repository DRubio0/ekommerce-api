@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <h2 class="text-5xl my-3 text-white font-bold text-center drop-shadow-lg shadow-black">Dashboard View</h2>
    <div class="grid grid-cols-3 gap-4 mt-4">
        <div class="bg-blue-500 text-white p-4 rounded tex shadow-xl shadow-black">
            <h3 class="text-lg font-bold text-black up">Users</h3>
            <p class="my-3 mb-0 ml-12 mr-12 p-2 text-2xl rounded bg-blue-600 hover:bg-blue-900 transition-colors uppercase text-center">
                {{$userCount}}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded tex shadow-xl shadow-black">
            <h3 class="text-lg font-bold text-black up">Products</h3>
            <p
                class="my-3 mb-0 ml-12 mr-12 p-2 text-2xl rounded bg-green-600 hover:bg-green-900 transition-colors uppercase text-center">
                {{ $productCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded tex shadow-xl shadow-black">
            <h3 class="text-lg font-bold text-black up">Orders</h3>
            <p class="my-3 mb-0 ml-12 mr-12 p-2 text-2xl rounded bg-yellow-600 hover:bg-yellow-900 transition-colors uppercase text-center">
            {{$orderCount}}
            </p>
        </div>
    </div>

    <h2 class="my-7 mb-5 text-2xl font-bold text-white">Product Registers</h2>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->price }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('product.status', $product->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="submit" value={{ $product->state ? '✓' : 'X' }}
                                    class="border-neutral-500 border-2 rounded w-8 text-center transition-colors cursor-pointer text-white hover:bg-yellow-500 hover:text-black {{ $product->state ? 'bg-green-800' : 'bg-red-600' }}">
                                <span>{{ $product->state ? 'Activo' : 'Inactivo' }}</span>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-container mt-3 bg-gray-100/20 p-2 rounded-xl">
        {{ $products->links('pagination::tailwind') }}
    </div>
@endsection
