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

        $user = User::factory()->create([
            'is_active' => true
        ]);

        Product::factory()->count(10)->create([
            'user_id' => $user->id,
            'is_active' => true
        ]);

        Product::factory()->count(10)->create([
            'user_id' => $user->id,
            'is_active' => false
        ]);
    }
}
