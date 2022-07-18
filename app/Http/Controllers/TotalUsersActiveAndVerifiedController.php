<?php

namespace App\Http\Controllers;

use App\Models\User;

class TotalUsersActiveAndVerifiedController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'total' => User::query()
                ->where('is_active', true)
                ->whereNotNull('email_verified_at')->count()
        ]);
    }
}
