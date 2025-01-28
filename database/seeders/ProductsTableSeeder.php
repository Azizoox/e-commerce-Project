<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the products table to start fresh
        DB::table('products')->truncate();

        // Define the products array
        $products = [
            [
                'title' => 'Product 1',
                'description' => 'Description for product 1',
                'image' => '/images/p1.jpg',
                'price' => 10.99,
                'quantity' => 100,
                'category' => 'Men',
            ],
            [
                'title' => 'Product 2',
                'description' => 'Description for product 2',
                'image' => '/images/p2.jpg',
                'price' => 12.99,
                'quantity' => 150,
                'category' => 'Women',
            ],
            [
                'title' => 'Product 3',
                'description' => 'Description for product 3',
                'image' => '/images/p3.jpg',
                'price' => 15.99,
                'quantity' => 200,
                'category' => 'PC',
            ],
            [
                'title' => 'Product 4',
                'description' => 'Description for product 4',
                'image' => '/images/p4.jpg',
                'price' => 18.99,
                'quantity' => 250,
                'category' => 'Men',
            ],
            [
                'title' => 'Product 5',
                'description' => 'Description for product 5',
                'image' => '/images/p5.jpg',
                'price' => 20.99,
                'quantity' => 300,
                'category' => 'Women',
            ],
            [
                'title' => 'Product 6',
                'description' => 'Description for product 6',
                'image' => '/images/p6.jpg',
                'price' => 22.99,
                'quantity' => 350,
                'category' => 'PC',
            ],
            [
                'title' => 'Product 7',
                'description' => 'Description for product 7',
                'image' => '/images/p7.jpg',
                'price' => 25.99,
                'quantity' => 400,
                'category' => 'Men',
            ],
            [
                'title' => 'Product 8',
                'description' => 'Description for product 8',
                'image' => '/images/p8.jpg',
                'price' => 28.99,
                'quantity' => 450,
                'category' => 'Women',
            ],
            [
                'title' => 'Product 9',
                'description' => 'Description for product 9',
                'image' => '/images/p1.jpg',
                'price' => 30.99,
                'quantity' => 500,
                'category' => 'PC',
            ],
            [
                'title' => 'Product 10',
                'description' => 'Description for product 10',
                'image' => '/images/p2.jpg',
                'price' => 32.99,
                'quantity' => 550,
                'category' => 'Men',
            ],
        ];

        // Insert the products into the database
        DB::table('products')->insert($products);
    }
}
