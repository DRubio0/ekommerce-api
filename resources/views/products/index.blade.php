@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')



<div class="flex flex-col"> 
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">

    </div>
<table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
        </tr>
    @endforeach
</tbody>
</table>
</div>

@endsection