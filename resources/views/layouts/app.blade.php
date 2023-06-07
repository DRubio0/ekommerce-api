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
    <div class="flex">
        <div class="w-1/5 bg-gray-800 text-white h-screen">
            <ul class="py-4">
                <li>
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class="block px-4 py-2 hover:bg-gray-700">Product</a>
                </li>
            </ul>
        </div>
        <div class="w-4/5 bg-white">
            <div class="px-4 py-2">
               @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
