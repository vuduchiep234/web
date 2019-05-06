<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    //
    protected $fillable = [
        'name', 'state', 'phone'
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
