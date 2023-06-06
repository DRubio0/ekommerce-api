@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div class="bg-blue-100 text-center justify-center p-11">
    <h1 class="mb-8">Hola</h1>
    <a class="bg-red-300 p-2 mt-4" href="{{route('product.index')}}">Products</a>
</div>
@endsection