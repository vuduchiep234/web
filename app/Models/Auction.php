<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //
    protected $fillable = [
        'creator_id', 'duration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'auction_product',
            'auction_id', 'product_id');
    }

    public function auctionProducts()
    {
        return $this->hasMany(AuctionProduct::class);
    }
}
