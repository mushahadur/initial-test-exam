<!-- resources/views/pages/welcome.blade.php -->
@extends('layouts.app')
@section('title')
Home Page
@endsection

@section('content')
<div class="container mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Product Card 1 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 1</h3>
            <p class="text-gray-600">$19.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 2 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 2</h3>
            <p class="text-gray-600">$29.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 3 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 3</h3>
            <p class="text-gray-600">$39.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 4 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 4</h3>
            <p class="text-gray-600">$49.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 5 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 5</h3>
            <p class="text-gray-600">$59.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 6 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 6</h3>
            <p class="text-gray-600">$69.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 7 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 7</h3>
            <p class="text-gray-600">$79.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    <!-- Product Card 8 -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="https://placehold.co/300x200" alt="Placeholder image of a product" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold">Product Name 8</h3>
            <p class="text-gray-600">$89.99</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add To Cart</button>
        </div>
    </div>
    
</div>
@endsection
