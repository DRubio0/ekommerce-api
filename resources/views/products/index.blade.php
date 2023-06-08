@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')
    <div class="my-12">
        <h1 class="font-bold uppercase text-xl text-center text-white drop-shadow-xl shadow-black mb-12">Products</h1>
        <div class="bg-blue-100/50 rounded p-3">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-xl">
                            <table class="w-full text-sm text-left text-gray-500  dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Stock
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Brand
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-3">
                                            SKU
                                        </th> --}}
                                        <th scope="col" class="px-6 py-3">
                                            Subcategory
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                {{ $product->id }}
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:text-red-500">
                                                <a href="{{ route('product.show', $product->id) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </th>
                                            <td class="px-2 py-4">
                                                $ {{ $product->price }}
                                            </td>
                                            <td class="px-2 py-4">
                                                {{ $product->stock }}
                                            </td>
                                            <td class="px-2 py-4">
                                                {{ $product->brand }}
                                            </td>
                                            {{-- <td class="px-6 py-4">
                                                {{ $product->sku }}
                                            </td> --}}
                                            <td class="px-2 py-4">
                                                {{ $product->subcategory->name }}
                                            </td>
                                            <td class="flex items-center px-2 py-4 space-x-3">
                                                <a href="{{ '/product/' . $product->id . '/edit' }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                        type="submit"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-container mt-3">
                            {{ $products->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-xs mx-auto">
            <a class=" my-3 flex items-center justify-center bg-white py-2 px-4 rounded-md shadow-md hover:bg-blue-300 font-bold transition-colors"
                href="{{ route('product.create') }}">New Product</a>
        </div>
    </div>
@endsection
