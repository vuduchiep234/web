<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
        'user_id', 'address', 'phone_number', 'first_name', 'last_name', 'avatar_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
