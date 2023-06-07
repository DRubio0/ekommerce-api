@extends('layouts.app')

@section('title')
    Create Product
@endsection

@section('content')
<div class="flex flex-col justify-center w-full items-center min-h-screen mx-auto bg-gradient-to-tr from-blue-700 via-blue-800 to-gray-900 gap-6 shadow-2xl py-12">
    <div class="max-w-lg bg-white p-6 rounded-xl">
        <h2 class="text-black uppercase font-bold text-2xl text-center">Edit Product</h2>

        <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data" class="w-full max-w-lg mt-4">
            @csrf
            @method('PUT')
            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">Product Name:</label>

                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text" placeholder="Product Name" value="{{old('name',$product->name)}}">
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 mb-6 md:mb-3 md:pr-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                        Price:
                    </label>

                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="price" name="price" type="number" placeholder="Price" value="{{old('price',$product->price)}}">

                    @error('price')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 mb-6 md:mb-3 md:pl-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="stock">Stock:</label>

                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="stock" type="number" name="stock" placeholder="stock" value="{{old('stock',$product->stock)}}">

                    @error('stock')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 md:pr-2 mb-6 md:mb-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brand">Brand:</label>

                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="brand" name="brand" type="text" placeholder="Brand" value="{{old('brand',$product->brand)}}">

                    @error('brand')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 md:pl-2 mb-6 md:mb-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="sku">SKU:</label>

                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sku" type="text" name="sku" placeholder="SKU" value="{{old('sku',$product->sku)}}">

                    @error('sku')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">Desciption:</label>

                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description" rows="5" placeholder="" value="">{{old('description',$product->description)}}</textarea>

                    @error('description')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full mb-6 md:mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subcategory_id">Subcategory</label>

                <div class="relative">
                    <select class="text-center block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="subcategory_id" name="subcategory_id">
                        <option  value="" selected disabled>-- Select --</option>
                        @foreach ($subcategories as $subcategory)
                            <option {{$product->id===$subcategory->id ? 'selected ' : ' '}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

            @error('subcategory_id')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">Image:</label>

                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-6 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="image" name="image" type="file">

                @error('image')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a class="bg-red-500 p-3 rounded md:w-1/2 justify-end text-white font-bold uppercase hover:bg-red-700 text-center m-1 transition-colors cursor-pointer" href="{{route('product.index')}}">Cancel</a>
                <input class="bg-blue-500 p-3 rounded md:w-1/2 justify-end text-white font-bold uppercase hover:bg-blue-700 m-1 transition-colors cursor-pointer" type="submit" value="Save Product">
            </div>
        </form>
    </div>
</div>
    
@endsection
