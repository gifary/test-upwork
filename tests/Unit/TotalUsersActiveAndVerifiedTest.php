<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TotalUsersActiveAndVerifiedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_total_user_active_and_verified()
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

        $this->getJson(route('total-user-active-and-verified'))
            ->assertJsonFragment([
                'total' => 10
            ]);
    }
}
