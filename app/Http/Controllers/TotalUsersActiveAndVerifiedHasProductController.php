<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class TotalUsersActiveAndVerifiedHasProductController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'total' => User::query()
                ->whereHas('products', function (Builder $builder) {
                    return $builder->where('is_active', true);
                })
                ->where('is_active', true)
                ->whereNotNull('email_verified_at')
                ->count()
        ]);
    }
}
