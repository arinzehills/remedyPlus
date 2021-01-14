<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id', 'user_id','phone', 'quantity', 'address','city','state', 
    ];

    public function user()
    {
       // return $this->belongsTo(User::class, 'user_id');
       return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
