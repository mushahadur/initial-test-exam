<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $discount = $this->calculateDiscount($cartItems);

        return view('pages.carts.index', compact('cartItems', 'discount'));
    }

    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $product = [
                'id' => $id,
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => 1
            ];

            $cart[$id] = $product;
        }

        session()->put('cart', $cart);

        $discount = $this->calculateDiscount($cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => count($cart),
            'discount_applied' => $discount > 0
        ]);
    }

    private function calculateDiscount($cartItems)
    {
        $totalQuantity = 0;
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $totalQuantity += $item['quantity'];
            $subtotal += $item['price'] * $item['quantity'];
        }
        $discount = 0;
        if ($totalQuantity >= 3) {
            $discount = $subtotal * 0.1;
        }

        return $discount;
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart)); 
        }

        return redirect()->route('cart')->with('success', 'Item removed from cart!');
    }
}
