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