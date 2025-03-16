@extends('layouts.app')
@section('title')
    Product List Page
@endsection

@section('content')

    <!-- Notification for Add to Cart Success -->
    <div id="cart-success-toast"
        class="fixed top-4 right-4 bg-green-400 text-white px-4 py-3 rounded-lg shadow-lg transform transition-all duration-200 translate-x-full opacity-0 z-50 flex items-center">
        <div class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <div>
            <p id="cart-success-message" class="font-medium"></p>
            <p class="text-sm" id="cart-item-count"></p>
        </div>
        <button id="close-toast" class="ml-4 text-white focus:outline-none hover:text-gray-200">
            ✕
        </button>
    </div>


    <!-- Page Title -->
    <div class="bg-teal-500 text-white py-5 mt-2">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <h1 class="text-3xl md:text-4xl font-bold">Product List</h1>
                </div>

                <!-- Search Bar -->
                <div class="relative w-full md:w-64">
                    <input id="search-input"
                        class="border text-gray-900 placeholder:text-gray-900 rounded-md py-2 px-4 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-teal-600"
                        placeholder="Search..." type="text" />
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Card Container -->
    <div id="product-list"
        class="container mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach ($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('image/product.webp') }}" alt={{ $product['name'] }} class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold">{{ $product['name'] }}</h3>
                    <p class="text-gray-600">${{ $product['price'] }}</p>
                    <div class="mt-4 flex justify-end">
                        <button class="add-to-cart-btn mt-2 bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-700"
                            data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}"
                            data-price="{{ $product['price'] }}">
                            <i class="fas fa-shopping-cart"></i> Add To Cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach


    </div>


    <div class="text-center py-8">
        <button class="mt-2 bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">Show More</button>
    </div>
    @if (count($products) === 0)
        <div class="text-center py-8">
            <p class="text-gray-800 text-bold">No products available.</p>
        </div>
    @endif


    <script>
        document.getElementById("search-input").addEventListener("keyup", function () {
            let searchValue = this.value;

            fetch(`{{ route('products.index') }}?search=${searchValue}`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
            })
                .then(response => response.json())
                .then(data => {
                    let productList = document.getElementById("product-list");
                    productList.innerHTML = ""; // Clear previous products

                    if (data.products.length === 0) {
                        productList.innerHTML = "<p>No products found</p>";
                        return;
                    }

                    data.products.forEach(product => {
                        let productCard = `
                                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ asset('image/water.png') }}" alt="Product name" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold">${product.name}</h3>
                            <p class="text-gray-600">$ ${product.price}</p>
                            <div class="mt-4 flex justify-end">
                                <button class="add-to-cart-btn mt-2 bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-700"
                                    data-id="${product.id}" data-name="${product.name}"
                                    data-price="${product.price}">
                                    <i class="fas fa-shopping-cart"></i> Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                            `;
                        productList.innerHTML += productCard;
                    });
                })
                .catch(error => console.error("Error fetching products:", error));
        });
    </script>


    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Get all "Add To Cart" buttons
                const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

                // Add click event listener to each button
                addToCartButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const productId = this.getAttribute('data-id');
                        const productName = this.getAttribute('data-name');
                        const productPrice = this.getAttribute('data-price');
                        // Send AJAX request to add product to cart
                        fetch(`/cart/add/${productId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name: productName,
                                price: productPrice
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Get the toast element
                                    const toast = document.getElementById('cart-success-toast');
                                    const successMessage = document.getElementById('cart-success-message');
                                    const itemCount = document.getElementById('cart-item-count');

                                    // Update message to include product name
                                    successMessage.textContent = `${productName} added to cart!`;

                                    // Update item count message
                                    if (data.discount_applied) {
                                        itemCount.textContent = `Cart (${data.cart_count}) - 10% discount applied!`;
                                    } else {
                                        itemCount.textContent = `Cart (${data.cart_count})`;
                                    }

                                    // Show the toast
                                    toast.classList.remove('translate-x-full', 'opacity-0');
                                    toast.classList.add('translate-x-0', 'opacity-100');

                                    // Update cart count in header
                                    updateCartCountDisplay(data.cart_count);

                                    // Hide toast after 3 seconds
                                    setTimeout(() => {
                                        toast.classList.remove('translate-x-0', 'opacity-100');
                                        toast.classList.add('translate-x-full', 'opacity-0');
                                    }, 3000);
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });

                // Function to update cart count display
                function updateCartCountDisplay(count) {
                    const cartCountElement = document.getElementById('cart-count');
                    if (cartCountElement) {
                        cartCountElement.textContent = `(${count.toString().padStart(2, '0')})`;
                    }
                }
            });
        </script>
    @endsection

@endsection