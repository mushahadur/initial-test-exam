@extends('layouts.app')

@section('title')
    Shopping Cart
@endsection

@section('content')
    <!-- Page Title -->
    <div class="bg-teal-500 text-white py-5 mt-2">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <h1 class="text-3xl md:text-4xl font-bold">Shopping Cart</h1>
                </div>
            </div>
        </div>
    </div>
<!--  Shopping Cart -->
    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-3 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(count($cartItems) > 0)
                                    <div class="flex flex-col lg:flex-row gap-8">
                                        <!-- Cart Items  -->
                                        <div class="lg:w-2/3">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                                                    <thead class="bg-gray-100">
                                                        <tr>
                                                            <th class="py-3 px-4 text-left">Image</th>
                                                            <th class="py-3 px-4 text-left">Product</th>
                                                            <th class="py-3 px-4 text-right">Price</th>
                                                            <th class="py-3 px-4 text-center">Quantity</th>
                                                            <th class="py-3 px-4 text-right">Subtotal</th>
                                                            <th class="py-3 px-4 text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-200">
                                                        @php
                                                            $subtotal = 0;
                                                            $totalQuantity = 0;
                                                        @endphp

                                                        @foreach($cartItems as $index => $item)
                                                                                        @php
                                                                                            $itemSubtotal = $item['price'] * $item['quantity'];
                                                                                            $subtotal += $itemSubtotal;
                                                                                            $totalQuantity += $item['quantity'];
                                                                                        @endphp
                                                                                        <tr class="hover:bg-gray-50">
                                                                                            <td class="py-3 px-4">
                                                                                                <img src="https://placehold.co/64x64" alt="{{ $item['name'] }}"
                                                                                                    class="w-16 h-16 object-cover rounded">
                                                                                            </td>
                                                                                            <td class="py-3 px-4">{{ $item['name'] }}</td>
                                                                                            <td class="py-3 px-4 text-right">${{ number_format($item['price'], 2) }}</td>
                                                                                            <td class="py-3 px-4 text-center">{{ $item['quantity'] }}</td>
                                                                                            <td class="py-3 px-4 text-right">${{ number_format($itemSubtotal, 2) }}</td>
                                                                                            <td class="py-3 px-4 text-center">
                                                                                                <form action="{{ route('cart.remove', ['index' => $index]) }}"
                                                                                                    method="POST">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button type="submit"
                                                                                                        class="text-red-500 hover:text-red-700 transition duration-200">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                stroke-width="2"
                                                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                                        </svg>
                                                                                                        Remove
                                                                                                    </button>
                                                                                                </form>
                                                                                            </td>
                                                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Order Summary -->
                                        <div class="lg:w-1/3 mt-6 lg:mt-0">
                                            <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                                                <div class="p-6">
                                                    <div class="p-4 bg-gray-300">
                                                        <h2 class="text-xl font-semibold text-gray-800">Order Summary</h2>
                                                    </div>
                                                    <div class="space-y-3 mt-3">
                                                        <div class="flex justify-between py-3 border-b border-gray-200 ">
                                                            <span class="font-medium text-gray-600">Subtotal</span>
                                                            <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                                                        </div>

                                                        @if($discount > 0)
                                                            <div class="flex justify-between pb-3 border-b border-gray-200 text-green-700">
                                                                <span class="font-medium">Discount (10% for 3+ items)</span>
                                                                <span class="font-medium">-${{ number_format($discount, 2) }}</span>
                                                            </div>
                                                        @endif

                                                        <div class="flex justify-between pt-2">
                                                            <span class="text-lg font-bold text-gray-800">Total</span>
                                                            <span
                                                                class="text-lg font-bold text-gray-800">${{ number_format($subtotal - $discount, 2) }}</span>
                                                        </div>
                                                    </div>

                                                    <!-- Discount info -->
                                                    <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded">
                                                        <p class="font-bold">Discount Information</p>
                                                        <p class="text-xs">Add 3 or more items to your cart and get a 10% discount!</p>
                                                        @if($totalQuantity < 3)
                                                            <p class="mt-1 text-xs">You currently have {{ $totalQuantity }} item(s). Add
                                                                {{ 3 - $totalQuantity }} more to qualify for the discount.</p>
                                                        @else
                                                            <p class="mt-1 text-xs">Your 10% discount has been applied!</p>
                                                        @endif
                                                    </div>

                                                    <div class="mt-6">
                                                        <button
                                                            class="w-full bg-cyan-500 text-white py-3 px-4 rounded-md font-medium hover:bg-cyan-600 transition duration-200">
                                                            Proceed to Checkout
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <a href="/"
                                            class="inline-block bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600 transition duration-200">
                                            Continue Shopping
                                        </a>
                                    </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">Your cart is empty.</p>
                            <a href="/" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Go Shopping
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection