<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TotalUsersActiveAndVerifiedHasProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_total_user_active_and_verified_and_has_active_product()
    {
        User::factory()->count(10)->create([
            'is_active' => true,
            'email_verified_at' => now()
        ]);

        User::factory()->count(20)->create([
            'is_active' => false,
            'email_verified_at' => now()
        ]);

        User::factory()->count(5)->create([
            'is_active' => false,
            'email_verified_at' => null
        ]);

        User::factory()->count(5)->create([
            'is_active' => true,
            'email_verified_at' => null
        ]);

        $user = User::factory()->create([
            'is_active' => true,
            'email_verified_at' => now()
        ]);

        $product = Product::factory()->create(
            [
                'is_active' => true
            ]
        );

        $user->products()->syncWithPivotValues([$product->id], [
            'quantity' => 100,
            'price' => 100
        ]);

        $this->getJson(route('total-user-active-and-verified-and-has-active-product'))
            ->assertJsonFragment([
                'total' => 1
            ]);
    }
}
