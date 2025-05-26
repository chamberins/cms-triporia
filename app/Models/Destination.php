<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'image', 'price', 'latitude', 'longitude'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
