<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Wireless Headphones', 'price' => 199],
            ['name' => 'Gaming Mouse', 'price' => 49],
            ['name' => 'Mechanical Keyboard', 'price' => 129],
            ['name' => 'LED Desk Lamp', 'price' => 25],
            ['name' => 'Smartphone Case', 'price' => 15],
            ['name' => 'Portable Charger', 'price' => 39],
            ['name' => 'Bluetooth Speaker', 'price' => 99],
            ['name' => 'Fitness Tracker', 'price' => 149],
            ['name' => 'Laptop Stand', 'price' => 45],
            ['name' => 'Noise Cancelling Earbuds', 'price' => 179],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
