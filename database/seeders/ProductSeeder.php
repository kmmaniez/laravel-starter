<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 100; $i++) { 
            # code...
            Product::insert([
                'id'        => fake()->uuid(),
                'name'      => fake()->company,
                'price'     => (mt_rand(1,10) * mt_rand(1,10)) * 250,
                'quantity'  => mt_rand(200, 500)
            ]);
        }
    }
}
