<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportBill extends Model
{
    //
    protected $fillable = [
        'creator_id', 'product_id', 'quantity', 'price'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
