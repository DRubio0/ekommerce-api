@extends('layouts.app')

@section('title')
Edit User Information    
@endsection

@section('content')
<div class="flex justify-center ">
    <div class="max-w-lg mt-20 bg-white p-6 rounded-xl">
        <h1 class="text-black uppercase font-bold text-2xl text-center">Edit User</h1>

        <form class="w-full max-w-lg mt-4" action="{{ route('user.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex items-center">
                <div class="w-1/2 pr-2">
                    <div class="w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="name">Name:</label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" name="name" id="name" 
                            value="{{ old('name',$user->name) }}"
                            placeholder="Write your name">
                        @error('name')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-1/2 pl-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="last_name">Lastname:</label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text" name="last_name" id="last_name" value="{{ old('last_name',$user->last_name) }}"
                        placeholder="Write your lastname">
                    @error('last_name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="email">Email:</label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="email" name="email" id="email" value="{{ old('email',$user->email) }}"
                    placeholder="Write your email">
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">Number
                    Phone:</label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="number" name="phone" id="phone" value="{{ old('phone',$user->phone) }}"
                    placeholder="Write your number phone">
                @error('phone')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-6 md:mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="role_id">Roles:</label>

                <div class="relative">
                    <select
                        class="text-center block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="role_id" name="role_id">
                        <option value="" selected disabled>-- Select --</option>
                        @foreach ($roles as $role)
                            <option {{ $role->id === $role->id ? 'selected' : ' ' }} value="{{$role->id}}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="password">Password:</label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="password" name="password" id="password" placeholder="Enter your password">
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="password_confirmation">Confirm Password:</label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
                @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a class="bg-red-500 p-3 rounded md:w-1/2 justify-end text-white font-bold uppercase m-1 hover:bg-red-700 transition-colors cursor-pointer text-center"
                    href="{{ route('user.index') }}">Cancel</a>
                <input
                    class="bg-blue-500 p-3 rounded md:w-1/2 justify-end text-white font-bold uppercase m-1 hover:bg-blue-700 transition-colors cursor-pointer"
                    type="submit" value="Save Product">
            </div>
        </form>
    </div>
</div>
@endsection