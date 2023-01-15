<?php

namespace App\Models;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "price",
        "stock",
        "status",
    ];
    //products belong to many cart and many orders
    public function carts()
    {
        return $this->morphedByMany(Cart::class,"productable")->withPivot("quantity");
    }

    public function orders()
    {
        return $this->morphedByMany(Order::class,"productable")->withPivot("quantity");
    }


    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }
}
