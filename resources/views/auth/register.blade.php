@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen bg-gradient-to-b from-gray-900 to-gray-600 bg-gradient-to-r">
        <div class="bg-white p-8 shadow-md rounded-lg">
            <h1 class=" text-center text-2xl font-bold mb-6">Register New Users</h1>

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

            <div class="max-w-md">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4 flex">
                        <div class="w-1/2 mr-2">
                            <label for="name" class="block font-semibold">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus
                                class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        </div>
                        <div class="w-1/2">
                            <label for="lastname" class="block font-semibold">Lastname:</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" autofocus
                                class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block font-semibold">Profile picture:</label>
                        <input id="image" name="image" type="file" accept="image/*"
                            class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block font-semibold">Phone:</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" autofocus
                            class="phone-input border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block font-semibold">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block font-semibold">Password:</label>
                        <input type="password" id="password" name="password"
                            class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block font-semibold">Confirm password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 w-1/2 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Register
                        </button>
                        <a href="{{ route('login') }}" class="bg-red-500 w-1/2 text-center hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
@endsection
