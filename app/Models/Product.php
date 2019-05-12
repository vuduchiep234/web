<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'detail', 'producer_id', 'category_id', 'state', 'image_url'
    ];

    protected $attributes = [
        'image_url' => 'http://saicrc.in/images/noimage.png'
    ];

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class);
    }

    public function importBills()
    {
        return $this->hasMany(ImportBill::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function auctions()
    {
        return $this->belongsToMany(Auction::class, 'auction_product',
            'product_id', 'auction_id');
    }

    public function auctionProducts()
    {
        return $this->hasMany(AuctionProduct::class);
    }
}
