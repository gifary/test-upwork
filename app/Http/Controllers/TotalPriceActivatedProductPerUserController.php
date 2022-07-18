<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TotalPriceActivatedProductPerUserController extends Controller
{
    public function __invoke()
    {
        $query =  DB::select("SELECT SUM(up.quantity*up.price) as total, u.id, u.name FROM users as u
                        JOIN user_products as up ON u.id=up.user_id
                        JOIN products as p ON p.id=up.product_id
                        where p.is_active=true GROUP by u.id, u.name
                        "
        );
        return response()->json([
            'data' => $query
        ]);
    }
}
