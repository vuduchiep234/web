<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionProduct extends Model
{
    //
    protected $table = 'auction_product';

    protected $fillable = [
        'user_id', 'auction_id', 'product_id', 'offer'
    ];

    protected $attributes = [
        'offer' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
