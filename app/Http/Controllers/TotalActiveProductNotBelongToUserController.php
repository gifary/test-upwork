<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class TotalActiveProductNotBelongToUserController extends Controller
{
    public function __invoke()
    {
        return response()->json([
           'total' =>  Product::query()
               ->where('is_active', true)
               ->doesntHave('users')
               ->count(),
        ]);
    }
}
