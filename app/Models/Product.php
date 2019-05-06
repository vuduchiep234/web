<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'detail', 'producer_id', 'category_id', 'image_id', 'state'
    ];

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
        return $this->hasMany(Auction::class);
    }
}
