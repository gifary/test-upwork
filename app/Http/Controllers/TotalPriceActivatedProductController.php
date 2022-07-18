<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TotalPriceActivatedProductController extends Controller
{
    public function __invoke()
    {
        $query =  DB::selectOne("SELECT SUM(up.quantity * up.price) as total
                        FROM user_products as up
                        JOIN products as p ON p.id=up.product_id
                        where p.is_active=true
                        "
        );
        return response()->json([
            'total' => intval($query->total)
        ]);
    }
}
