@extends('layouts.app')

@section('title')
    Products
@endsection

@section('content')
    <div class=" w-full min-h-screen bg-gradient-to-tr from-blue-700 via-blue-800 to-gray-900 flex flex-col">
        <div class=" max-w-7xl mx-auto flex flex-col justify-center items-center flex-1">
            <h1 class="uppercase text-white text-bold text-3xl hover:animate-pulse font-bold">Products</h1>
            
            <div class=" bg-lime-600 hover:bg-lime-800 text-white p-3 rounded-xl mr-0 ml-auto cursor-pointer transition-colors">
                <a href="{{route('product.create')}}">Crear Producto</a>
            </div>

            <div class="overflow-x-auto">
                <div class="inline-block min-w-full py-2">
                    <div class="overflow-hidden">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-4 border-white">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                        <th scope="col" class="px-6 py-3">
                                            Image
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            SKU
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
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $product->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                $ {{ $product->price }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->stock }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->brand }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->image }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->description }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->sku }}
                                            </td>
                                            <td class="flex items-center px-6 py-4 space-x-3">
                                                <a href="#"
                                                    class="font-medium text-white hover:bg-blue-900 px-4 py-1 bg-blue-700 rounded transition-colors">Edit</a>
                                                <a href="#"
                                                    class="font-medium text-white hover:bg-red-900 px-4 py-1 bg-red-700 rounded transition-colors">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                                <tr>
                                    <th scope="col" class=" px-6 py-4">#</th>
                                    <th scope="col" class=" px-6 py-4">Name</th>
                                    <th scope="col" class=" px-6 py-4">Price</th>
                                    <th scope="col" class=" px-6 py-4">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $product->id }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $product->name }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $product->price }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $product->stock }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
