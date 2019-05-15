<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'image_url', 'image_name',
    ];

    protected $attributes = [
        'image_name' => 'Untitled',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
