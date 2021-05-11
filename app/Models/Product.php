<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "product_photo_path", "price", "size", "in_stock", "available", "category_id"];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class)
        ->withPivot(['quantity', 'created_at', 'updated_at']);
    }

   public function scopeGetProducts($query, $request){
     
    $query->when($request['search'] ?? null, function($query) use($request){
        $query->where('name','like', '%'. $request["search"] .'%');   
    })
    ->when($request['category'] ?? null, function($query) use($request){  
        $query->where('category_id', $request["category"]);
    });

    return $query;
   }

}
