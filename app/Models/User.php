<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The Attributes that are mass assignable
     * @var array
     */

    protected $table = 'users';


     protected $fillable = [
         'email', 'password', 'role_id', 'name',
     ];

    /**
     * The attributes that should be hidden for arrays
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $attributes = [
      'avatar_url' => 'http://saicrc.in/images/noimage.png'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function exportBills()
    {
        return $this->hasMany(ExportBill::class);
    }

    public function importBills()
    {
        return $this->hasMany(ImportBill::class);
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function card()
    {
        return $this->hasOne(Card::class);
    }
}
