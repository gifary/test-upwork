<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TotalPriceActivatedProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_total_amount_active_product()
    {
        $user = User::factory()->create();

        Product::factory()->count(10)->create(
            [
                'is_active' => true
            ]
        );

        $product = Product::factory()->create(
            [
                'is_active' => true
            ]
        );

        $product2 = Product::factory()->create(
            [
                'is_active' => true
            ]
        );

        $product3 = Product::factory()->create(
            [
                'is_active' => false
            ]
        );

        $user->products()->syncWithPivotValues([$product->id, $product2->id, $product3->id], [
            'quantity' => 100,
            'price' => 100
        ]);

        $user2 = User::factory()->create();

        $user2->products()->syncWithPivotValues([$product2->id], [
            'quantity' => 50,
            'price' => 100
        ]);

        $this->getJson(route('total-price-activated-product'))
            ->assertJsonFragment([
                'total' => 250 * 100
            ]);
    }
}
