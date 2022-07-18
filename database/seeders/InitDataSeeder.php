<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class InitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->unverified()->create([
            'is_active' => false
        ]);

        Product::factory()->count(10)->create();

        $user = User::factory()->create([
            'is_active' => true
        ]);

        $product1 = Product::factory()->create()->id;
        $product2 = Product::factory()->create()->id;
        $product3 = Product::factory()->create()->id;

        $user->products()->syncWithPivotValues([$product1, $product2, $product3] ,[
           'price' => 100,
           'quantity' => 99
        ]);
    }
}
