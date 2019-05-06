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
        'email', 'password'
    ];

    // protected $fillable = [
    //     'email', 'first_name', 'last_name', 'password', 'phone', 'role_id', 'image_id'
    // ];

    /**
     * The attributes that should be hidden for arrays
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
}
