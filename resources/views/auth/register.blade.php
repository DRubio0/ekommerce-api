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

        <div class="max-w-md">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-4 flex">
                    <div class="w-1/2 mr-2">
                        <label for="name" class="block font-semibold">Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                            class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <div class="w-1/2">
                        <label for="lastname" class="block font-semibold">Lastname:</label>
                        <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required autofocus
                            class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                </div>
        
                <div class="mb-4">
                    <label for="image" class="block font-semibold">Profile picture:</label>
                    <input id="image" name="image" type="file" accept="image/*" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                
                <div class="mb-4">
                    <label for="phone" class="block font-semibold">Phone:</label>
                    <input type="number" id="phone" name="phone" value="{{ old('phone') }}" required autofocus
                        class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
        
                <div class="mb-4">
                    <label for="email" class="block font-semibold">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
        
                <div class="mb-4">
                    <label for="password" class="block font-semibold">Password:</label>
                    <input type="password" id="password" name="password" required
                        class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
        
                <div class="mb-6">
                    <label for="password_confirmation" class="block font-semibold">Confirm password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
        
                <button type="submit" class="bg-green-500 w-full hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                    Register
                </button>
            </form>
        </div>
        
    </div>
</div>
@endsection
