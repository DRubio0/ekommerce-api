<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.phone-input').inputmask({
                mask: '(999) 9999-9999',
                placeholder: ' ',
                showMaskOnHover: false,
                showMaskOnFocus: false,
            });
        });
    </script>
    @vite('resources/css/app.css')
    <title>Page - @yield('title')</title>
</head>

<body>

    @guest
        @yield('content')
    @else
        <div class="flex">
            <div class="w-1/5  bg-gray-800  text-white min-h-screen flex flex-col">
                <div class="flex items-center justify-center h-16 bg-gray-900 hover:bg-gray-600">
                    <a href="" class="w-20 flex items-center mx-auto">
                        <img src="{{ asset('logo.png') }}" alt="logo">
                        {{-- <span class="ml-2">eKommerce</span> --}}
                    </a>
                </div>

                @if (isset($name))
                    <div class="px-4 py-2 text-sm text-gray-400 mt-2">
                        <p class=" font-bold">
                            Welcome -
                            <a class=" uppercase">
                                {{ $name }} <br>
                                {{ $role }}
                            </a>
                        </p>
                    </div>
                @endif
                
                <div class="flex-grow flex flex-col">
                    <ul class="py-4 flex-grow">
                        <li>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6 inline-block mr-2"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}" class="block px-4 py-2 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="h-6 w-6 inline-block mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                </svg>

                                Products
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}" class="block px-4 py-2 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="h-6 w-6 inline-block mr-2" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('order.index') }}" class="block px-4 py-2 hover:bg-gray-700">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                </svg>

                                Orders
                            </a>
                        </li>
                    </ul>

                    <div class="mt-auto">
                        @guest
                            <a href="{{ route('login') }}"
                                class="w-full text-center text-sm text-gray-400 hover:text-white flex mt-auto mb-0 justify-center items-center h-16 bg-gray-900 hover:bg-gray-600 cursor-pointer">Login</a>
                        @else
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="w-full text-center text-sm text-gray-400 hover:text-white flex mt-auto mb-0 justify-center items-center h-16 bg-gray-900 hover:bg-gray-600 cursor-pointer">Sign Out</button>
                            </form>
                        @endguest
                    </div>
                </div>


            </div>

            <div class="w-full bg-gradient-to-tl from-blue-700 via-blue-800 to-gray-900">
                <div class="px-4 py-2">
                    @yield('content')
                </div>
            </div>
        </div>
    @endguest

</body>

</html>
