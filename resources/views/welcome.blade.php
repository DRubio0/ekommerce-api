@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-1/5 bg-gray-800 text-white">
        <ul class="py-4">
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
            </li>
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-700">Product</a>
            </li>
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-700">Users</a>
            </li>
        </ul>
    </div>
    <div class="w-4/5 bg-white">
        <div class="px-4 py-2">
                <h2 class="text-2xl font-bold">Product View</h2>
                <!-- Contenido de la vista de productos -->
        </div>
    </div>
</div>
@endsection
