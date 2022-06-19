<?php

use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Burger Bun',
            'image' => 'burgerbun.jpg',
            'price' => '450',
            'status' => 1
        ]);
    }
}
