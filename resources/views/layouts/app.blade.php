<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-lg font-bold">
                <a href="{{ route('products.index') }}">LOGO</a>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('products.index') }}"
                    class="bg-blue-100 text-grey-950 font-bold px-3  rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Products
                </a>

                <a href="{{ route('cart') }}" class="text-gray-300 hover:text-white relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cart-count" class="text-sm text-red-600 absolute top">
                        ({{ str_pad(count(session()->get('cart', [])), 2, '0', STR_PAD_LEFT) }})
                    </span>
                </a>

            </div>
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-300 hover:text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div id="menu" class="hidden md:hidden">
            <a href="{{ route('products.index') }}" class="block text-gray-300 hover:text-white px-2 py-1">Products</a>
            <a href="{{ route('cart') }}" class="text-gray-300 hover:text-white relative">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" class="text-sm text-red-600 absolute top">
                    ({{ str_pad(count(session()->get('cart', [])), 2, '0', STR_PAD_LEFT) }})
                </span>
            </a>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-auto">
        <p>
            © 2025 Mushahedur
        </p>
    </footer>

    @yield('scripts')
    <script>
        document.getElementById('menu-btn').addEventListener('click', function () {
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