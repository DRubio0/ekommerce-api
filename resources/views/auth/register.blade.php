@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Registro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="name" class="block font-semibold">Lastname:</label>
                <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required autofocus
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="name" class="block font-semibold">Phone:</label>
                <input type="number" id="phone" name="phone" value="{{ old('phone') }}" required autofocus
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="password" class="block font-semibold">Contraseña:</label>
                <input type="password" id="password" name="password" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block font-semibold">Confirmar contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Registrarse
            </button>
        </form>
    </div>
</div>
@endsection
