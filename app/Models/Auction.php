<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //
    protected $fillable = [
        'user_id', 'product_id', 'offer',
    ];

    protected $attributes = [
        'offer' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
