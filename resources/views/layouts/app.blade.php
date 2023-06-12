<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    <title>Page - @yield('title')</title>
</head>

<body>
    
    @guest
        @yield('content')
    @endguest

    <div class="flex">
        <div class="w-1/6 bg-gray-800  text-white min-h-screen">
            <div class="flex items-center justify-center h-16 bg-gray-900 hover:bg-gray-600">
                <a href="" class=" w-10 mx-auto">Logo</a>
            </div>

            @if (isset($name))
            <div class="px-4 py-2 text-sm text-gray-400 mt-2">
                <p class=" font-bold">
                    Welcome - <br>
                    <a class=" uppercase">
                        {{ $name }} <br>
                        {{$role}}
                    </a>
                </p>
            </div> 
            @endif

            <ul class="py-4">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Product
                    </a>
                </li>
                <li>
                    <a href="{{route('user.index')}}" class="block px-4 py-2 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="h-6 w-6 inline-block mr-2" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{route('order.index')}}" class="block px-4 py-2 hover:bg-gray-700">
                        
                        <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 inline-block mr-2"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                          </svg>
                          
                        Orders
                    </a>
                </li>
            </ul>

            <div class=" mt-60">
            <div class="flex mt-auto mb-0 justify-center items-center h-16 bg-gray-900 hover:bg-gray-600">

                    @guest
                    <a href="{{ route('login') }}" class="w-full text-center text-sm text-gray-400 hover:text-white">Iniciar
                        sesión</a>
                    @else
                    <form action="{{ route('logout') }}" method="POST"> 
                        @csrf
                        <button class="w-full text-center text-sm text-gray-400 hover:text-white">Cerrar
                            sesión</button>
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

</body>

</html>
