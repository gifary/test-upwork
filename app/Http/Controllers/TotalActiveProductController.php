<?php

namespace App\Http\Controllers;

use App\Models\Product;

class TotalActiveProductController extends Controller
{
    public function __invoke()
    {
        return response()->json([
           'total' =>  Product::query()->where('is_active', true)->count(),
        ]);
    }
}
