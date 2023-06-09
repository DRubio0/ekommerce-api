@extends('layouts.app')

@section('title')
    Show Product
@endsection

@section('content')
    <div class="flex justify-center ">
        <div class="max-w-lg w-auto mt-3 bg-blue-100/20 p-6 rounded-xl">

            <h1 class="font-bold uppercase text-4xl text-center mb-4">Product View</h1>
            <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-2xl">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                </a>
                <div class="p-5">
                    <h2 class="mb-2 uppercase text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $product->name }}</h2>
                    <div class="flex justify-between items-center">
                        <p class="text-gray-500 uppercase font-bold">
                            Brand:
                            {{ $product->brand }}
                        </p>
                        <p class="text-gray-500 uppercase font-bold">
                            SKU: {{ $product->sku }}

                        </p>
                    </div>
                    <div class=" mt-1 bg-gray-200 pl-3 pb-1.5 border-2 border-blue-500 rounded">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        <h4 class=" font-bold text-lg"> Description:</h4>
                        <p class="text-lg text-blue-500 font-bold">
                            {{ $product->description }}
                        </p>
                        </p>
                    </div>
                    <div class=" mt-1 bg-gray-200 pl-3 pb-1.5 border-2 border-blue-500 rounded">
                        <h4 class=" font-bold text-lg">Price:</h4>
                        <p class="text-lg text-blue-500 font-bold">
                            $ {{ $product->price }}
                        </p>
                    </div>
                    <div class=" mt-1 mb-2 bg-gray-200 pl-3 pb-1.5 border-2 border-blue-500 rounded">
                        <h4 class=" font-bold text-lg">Category:
                            <a class="text-lg text-blue-500 font-bold">{{ $product->subcategory->name }} </a>
                        </h4>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('product.index') }}"
                            class=" text-xl inline-flex items-center px-3 py-2 font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-yellow-600 transition-colors focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                            Return
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
