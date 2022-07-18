<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TotalActiveProductNotBelongToUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_total_active_product_not_belong_to_user()
    {
        Product::factory()->count(10)->create([
            'is_active' => true
        ]);

        $product = Product::factory()->create(
            [
                'is_active' => true
            ]
        );

        $user = User::factory()->create();

        $user->products()->syncWithPivotValues([$product->id], [
           'quantity' => 100,
           'price' => 100
        ]);

        Product::factory()->count(20)->create([
            'is_active' => false
        ]);

        $this->getJson(route('total-active-product-not-belong-to-user'))
            ->assertJsonFragment([
            'total' => 10
        ]);
    }
}
