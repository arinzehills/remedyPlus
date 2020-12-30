<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'price', 'units', 'description', 'image'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function presentPrice(){
        return money_format('$%i', $this->price/100);
    }
    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
