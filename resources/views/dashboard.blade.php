@extends('layouts.app')

@section('content')
    <h2 class="text-5xl my-3 text-blue-900 font-bold text-center drop-shadow-lg shadow-black">Dashboard View</h2>
    <div class="grid grid-cols-3 gap-4 mt-4">
        <div class="bg-blue-500 text-white p-4">
            <h3 class="text-lg font-bold">Users</h3>
            <p>NOTA: Aca va refenciado el total de usuarios registrados</p>
        </div>
        <div class="bg-green-500 text-white p-4">
            <h3 class="text-lg font-bold">Products</h3>
            <p>{{ $ProductCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4">
            <h3 class="text-lg font-bold">Orders</h3>
            <p>NOTA: Aca va refenciado el total de usuarios registrados</p>
        </div>
    </div>

    <h2 class="my-12 text-2xl font-bold">Product Registers</h2>
    <table class="w-full mt-4 border border-black">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form action="{{ route('product.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="state" value="0">
                            <label class="switch">
                                <input type="checkbox" name="state" value="1" onchange="this.form.submit()" {{ $product->state ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                            <span>{{ $product->state ? 'Activo' : 'Inactivo' }}</span>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
