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
      // \app\Models\Product::factory(40)->create();
       //\app\Models\Product::factory(100)->create();
       Product::factory(100)->create();
    }
}
