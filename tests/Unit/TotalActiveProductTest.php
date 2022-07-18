<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TotalActiveProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_total_active_product()
    {
        Product::factory()->count(10)->create([
            'is_active' => true
        ]);

        Product::factory()->count(20)->create([
            'is_active' => false
        ]);

        $this->getJson(route('total-active-product'))->assertJsonFragment([
            'total' => 10
        ]);
    }
}
