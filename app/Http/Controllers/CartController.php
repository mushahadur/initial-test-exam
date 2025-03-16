<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the cart page
     */
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $discount = $this->calculateDiscount($cartItems);

        return view('pages.carts.index', compact('cartItems', 'discount'));
    }

    /**
     * Add an item to cart
     */
    public function addToCart(Request $request, $id)
    {
        // Get the current cart from session
        $cart = session()->get('cart', []);

        // Check if product already exists in cart
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Get product info from request
            $product = [
                'id' => $id,
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => 1
            ];

            $cart[$id] = $product;
        }

        // Update cart in session
        session()->put('cart', $cart);

        // Calculate discount
        $discount = $this->calculateDiscount($cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => count($cart),
            'discount_applied' => $discount > 0
        ]);
    }

    /**
     * Calculate discount based on cart items
     *
     * @param array $cartItems
     * @return float
     */
    private function calculateDiscount($cartItems)
    {
        // Get total quantity of items in cart
        $totalQuantity = 0;
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $totalQuantity += $item['quantity'];
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Apply 10% discount if 3 or more products are in cart
        $discount = 0;
        if ($totalQuantity >= 3) {
            $discount = $subtotal * 0.1; // 10% discount
        }

        return $discount;
    }

    public function remove($index)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$index])) {
        unset($cart[$index]);
        session()->put('cart', array_values($cart)); // Re-index the array
    }

    return redirect()->route('cart')->with('success', 'Item removed from cart!');
}
}