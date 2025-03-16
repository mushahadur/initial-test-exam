<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-lg font-bold">
                <a href="#">LOGO</a>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Products</a>
                <a href="#" class="text-gray-300 hover:text-white"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-300 hover:text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div id="menu" class="hidden md:hidden">
            <a href="#" class="block text-gray-300 hover:text-white px-2 py-1">Products</a>
            <a href="#" class="block text-gray-300 hover:text-white px-2 py-1"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>
 <!-- Footer -->
 <footer class="bg-gray-800 text-white text-center p-4 mt-4">
    <p>
     © 2025 Mushahedur
    </p>
   </footer>
    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>