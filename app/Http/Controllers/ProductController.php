<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Product A',
            'price' => 100,
        ],
        [
            'id' => 2,
            'name' => 'Product B',
            'price' => 200,
        ],
        [
            'id' => 3,
            'name' => 'Product C',
            'price' => 300,
        ],
        [
            'id' => 4,
            'name' => 'Product D',
            'price' => 400,
        ],
        [
            'id' => 5,
            'name' => 'Product E',
            'price' => 500,
        ],
        [
            'id' => 6,
            'name' => 'Product F',
            'price' => 600,
        ],
        [
            'id' => 7,
            'name' => 'Product G',
            'price' => 700,
        ],
        [
            'id' => 8,
            'name' => 'Product H',
            'price' => 800,
        ],
        [
            'id' => 9,
            'name' => 'Product I',
            'price' => 900,
        ],

        [
            'id' => 10,
            'name' => 'Product J',
            'price' => 900,
        ],

        [
            'id' => 11,
            'name' => 'Product K',
            'price' => 900,
        ],

        [
            'id' => 12,
            'name' => 'Product L',
            'price' => 900,
        ],
    ];

    public function index(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        // Filter products by name
        $products = collect($this->products)->filter(function($product) use ($search) {
            return stripos($product['name'], $search) !== false;
        })->values()->all();
    } else {
        $products = $this->products;
    }

    return view('pages.products.index', ['products' => $products]);
}

}
