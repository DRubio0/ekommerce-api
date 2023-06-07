@extends('layouts.app')

@section('title')
    Show Product
@endsection

@section('content')
    <div
        class="flex flex-col justify-center w-full items-center h-screen mx-auto bg-gradient-to-tr from-blue-700 via-blue-800 to-gray-900 gap-6 shadow-2xl">
        <h1 class="font-bold uppercase text-xl text-white">Product</h1>
        <div class="bg-white">

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
                        <p class="text-gray-500 uppercase">
                            SKU: {{ $product->sku }}

                        </p>
                    </div>
                    <div class=" mt-1 bg-gray-200 pl-3 pb-1.5 border-2 border-blue-500 rounded">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        <h4 class=" font-bold"> Description:</h4>{{ $product->description }}
                        </p>
                    </div>
                        <div class=" mt-1 bg-gray-200 pl-3 pb-1.5 border-2 border-blue-500 rounded">
                            <h4 class=" font-bold">Price:</h4>$ {{ $product->price }}
                        </div>
                        <div class=" mt-1 mb-2 bg-gray-200 pl-3 pb-1.5 border-2 border-blue-500 rounded">
                            <h4 class=" font-bold">Category: {{ $product->subcategory->name }}</h4>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{route('product.index')}}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                            Return
                        </a>
                        </div>
                    
                </div>
            </div>

            {{-- <div class="max-w-sm rounded overflow-hidden shadow-lg">
                  
                        <img class="flex" width="150px" height="150px" src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}">
                    
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$product->name}}</div>
                        <p class="text-gray-700 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                            perferendis eaque, exercitationem praesentium nihil.
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div> --}}
        </div>
    </div>
@endsection
