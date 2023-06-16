@extends('layouts.app')

@section('title')
    Show Product
@endsection

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-lg w-auto mt-3 bg-blue-100/20 p-6 rounded-xl">
            <h1 class="font-bold uppercase text-4xl text-center mb-4 text-white">Showing Product {{$product->id}}</h1>

            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <img class="p-8 rounded-t-lg text-white" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                </div>

                <div class="px-5 pb-5">
                    <p class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name}}</p>

                    <div class="flex  mt-2.5 mb-5 justify-between items-center">
                        <p class="text-gray-900 dark:text-white">Brand: {{$product->brand}}</p> 
                        
                        
                        <p class="text-gray-900 dark:text-white">Category: {{$product->subcategory->name}}</p>
                    </div>

                    <div class="flex items-center mt-2.5 mb-5">
                        <p class="text-gray-900 dark:text-white font-bold">{{$product->description}}</p>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->price}}</span>
                        <a href="{{route('product.index')}}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Return</a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection
