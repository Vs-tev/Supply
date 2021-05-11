<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ["status", "user_id"];

    protected $casts = [
        'updated_at' => 'datetime:d M Y',
        'created_at' => 'datetime:d M Y',
    ];
    protected $appends = [
        'time_hour'
    ];

    public function getTimeHourAttribute()
    {
      return $this->updated_at->format('H:i');
    }

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function products(){
      return $this->belongsToMany(Product::class)
      ->withPivot(['quantity', 'created_at', 'updated_at']);
    }

    public function scopeTotal_sales($query, $date){

      $query = $this->where([['updated_at', '>=', $date], ['basket', 0]])
        ->with('products:id,price')
        ->get();
        
      $query = $query->map(function($object){
            foreach($object->products as $item){
               $item->total_price = ($item->pivot->quantity * $item->price);
            }
            return $object;
      });

      $query = $query->sum(function ($product) {
            return $product->products->sum('total_price');
      });

      return $query;
    }

    public function scopeBasket(){

     $basket = $this->where([['user_id', auth()->id()],['basket', 1]])
      ->with('products:id,name,description,price,size,product_photo_path')
      ->withCount('products')
      ->get();
      
      $basket = $basket->map(function($object){
          foreach($object->products as $item){
             $item->total_price = ($item->pivot->quantity * $item->price);
          }
          return $object;
      });

    return $basket;
   
  }
}
