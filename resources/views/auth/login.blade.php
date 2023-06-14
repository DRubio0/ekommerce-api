@extends('layouts.app')
@section('title')
    Login
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Login</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-2">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-semibold mb-2">Password:</label>
                    <input type="password" id="password" name="password" required
                        class="w-full border border-gray-300 rounded p-2">
                </div>
              
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="font-semibold">Remember me</label>
                    <button type="submit" class=" ml-32 bg-blue-500 text-white px-4 py-2 rounded">Login</button>
                </div>
            </form>
            <div class="mt-4">
                <p>¿You do not have an account? <a href="{{ route('register') }}" class="text-blue-500">Create Account</a></p>
            </div>
        </div>
    </div>
@endsection
