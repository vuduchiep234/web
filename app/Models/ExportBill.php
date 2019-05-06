<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExportBill extends Model
{
    //
    protected $fillable = [
        'creator_id', 'bill_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
