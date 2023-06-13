@extends('layouts.app')

@section('title')
    Show User
@endsection

@section('content')
    <div class="flex justify-center ">
        <div class="  max-w-lg w-auto mt-5 bg-blue-100/20 p-6 rounded-xl">
            <h1 class="font-bold  text-4xl text-center mb-4">User ID: {{ $user->id }}</h1>
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 rounded-full" src="{{ asset('storage/' .$user->image)}}" alt="{{$user->name}}" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Name: {{$user->name}} {{$user->last_name}}</h5>
                            Role: {{$user->role->name}}
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            Email: {{$user->email}}
                         </div>
                         <div class="flex items-center mt-2.5 mb-5">
                            Telephone: {{$user->phone}}
                         </div>
                        <div class="flex items-center justify-between">
                            <a href="{{route('user.index')}}"
                                class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Return</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
