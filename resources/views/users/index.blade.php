@extends('layouts.app')

@section('title')
    Users
@endsection

@section('content')
    <div class="my-12">
        <h1 class="font-bold uppercase text-xl text-center text-white drop-shadow-xl shadow-black mb-12">Registered Users</h1>
        <div class="bg-blue-100/50 rounded p-3">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-xl">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Lastname
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Phone
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                email
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Rol
                                            </th>

                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    {{ $user->id }}
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $user->name }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $user->last_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $user->phone }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $user->role->name }}
                                                </td>
                                                <td class="flex items-center px-6 py-4 space-x-3">
                                                    <a href="{{'/users/'.$user->id . '/edit'}}"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                        type="submit"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                        onclick="return confirm('Are you sure you want to delete the user?')">Delete
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container mt-3">
                                {{ $users->links('pagination::tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-xs mx-auto">
                <a class=" my-3 flex items-center justify-center bg-white py-2 px-4 rounded-md shadow-md hover:bg-blue-300 font-bold transition-colors"
                    href="{{ route('user.create') }}">New User</a>
            </div>
        </div>
    @endsection
