<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{ 
    //
    protected $fillable = [
        'billdetail_id', 'user_id', 'shipper_id', 'state'
    ];

    public function billDetail(){
        return $this->belongsTo(BillDetail::class, 'billdetail_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shipper(){
        return $this->belongsTo(Shipper::class);
    }

    public function exportBill(){
        return $this->hasOne(ExportBill::class);
    }
}
