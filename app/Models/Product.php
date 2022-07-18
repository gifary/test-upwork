<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean',
        'quantity' =>'int',
        'price' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
