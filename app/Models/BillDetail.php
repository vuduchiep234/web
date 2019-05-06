<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $fillable = [
        'product_id', 'quantity', 'price', 'address'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function bill(){
        return $this->hasOne(Bill::class, 'billdetail_id', 'id');
    }
}
