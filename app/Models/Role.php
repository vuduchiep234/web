<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    private static $ROLE_ADMIN = 'admin';
    private static $ROLE_BUSINESS_MANAGER = 'business_manager';
    private static $ROLE_BUYER = 'buyer';
    private static $ROLE_SELLER = 'seller';

    /**
     * The Attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'type'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
