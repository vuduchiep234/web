<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
        'user_id', 'address', 'phone',
    ];

    protected $table= 'cards';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
