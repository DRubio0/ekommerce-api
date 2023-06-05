@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')
    <div class="flex flex-col justify-center w-full items-center h-screen mx-auto bg-gradient-to-tr from-blue-700 via-blue-800 to-gray-900 gap-6 shadow-2xl">
        <h1 class="uppercase text-white text-bold text-3xl hover:animate-pulse hover:cursor-pointer ">Products Table</h1>
        <div class="bg-white md:ps-1">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                            Subcategory
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
                                                {{$product->subcategory_id}}
                                            </td>
                                            <td>
                                                {{ $product->sku }}
                                            </td>
                                            <td class="flex items-center px-6 py-4 space-x-3">
                                                <a href="{{'/product/'.$product->id.'/edit'}}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Delete</button>
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-3 rounded-xl hover:bg-gray-300">
            <a href="{{ route('product.create') }}">Crear Producto</a>
        </div>
    </div>

    {{-- <div class="flex flex-col justify-center w-full items-center h-screen mx-auto bg-gradient-to-tr from-blue-700 via-blue-800 to-gray-900 gap-6 shadow-2xl">
        <div class="bg-white">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center text-sm font-light">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a class="text-black font-bold bg-yellow-50 p-2 rounded hover:bg-yellow-100" href="{{route('product.create')}}">Create new Product</a>
        
    </div> --}}
@endsection
