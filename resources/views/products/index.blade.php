@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')
    <div class="flex flex-col justify-center w-full items-center h-screen mx-auto bg-gradient-to-tr from-blue-700 via-blue-800 to-gray-900 gap-6 shadow-2xl">
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
        
    </div>
@endsection
