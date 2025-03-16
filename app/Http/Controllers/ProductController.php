<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Fountain Pen',
            'price' => 25,
        ],
        [
            'id' => 2,
            'name' => 'Smartphone',
            'price' => 699,
        ],
        [
            'id' => 3,
            'name' => 'Digital Watch',
            'price' => 150,
        ],
        [
            'id' => 4,
            'name' => 'Laptop Computer',
            'price' => 1200,
        ],
        [
            'id' => 5,
            'name' => 'Water Heater',
            'price' => 350,
        ],
        [
            'id' => 6,
            'name' => 'Wireless Earbuds',
            'price' => 89,
        ],
        [
            'id' => 7,
            'name' => 'Coffee Maker',
            'price' => 120,
        ],
        [
            'id' => 8,
            'name' => 'Desk Lamp',
            'price' => 45,
        ],
        [
            'id' => 9,
            'name' => 'Bluetooth Speaker',
            'price' => 79,
        ],
        [
            'id' => 10,
            'name' => 'Fitness Tracker',
            'price' => 129,
        ],
        [
            'id' => 11,
            'name' => 'Electric Kettle',
            'price' => 59,
        ],
        [
            'id' => 12,
            'name' => 'Backpack',
            'price' => 65,
        ],
    ];


    public function index(Request $request)
    {
        $query = $request->input('search');

        $products = $this->products;

        if ($query) {
            $products = collect($this->products)->filter(function ($product) use ($query) {
                return stripos($product['name'], $query) !== false;
            })->toArray();
        }

        if ($request->ajax()) {
            return response()->json(['products' => array_values($products)]);
        }

        return view('pages.products.index', ['products' => $products]);
    }


}
