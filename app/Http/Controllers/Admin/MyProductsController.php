<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreMyProductsRequest;
use App\Http\Requests\UpdateMyProductsRequest;

class MyProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified', 'is_admin']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $categories = Category::all();

        $products = Product::with('category')->whereHas('category' , function ($query) use ($request) {
            if(!empty($request->category)){
                $query->where('name', $request->category);
            }
        })
        ->get();

        return Inertia::render('Admin/MyProducts/MyProducts', ['categories' => $categories, 'products' => $products]);
    }

    public function toggleProductAvailability(Request $request){
        
        $product = Product::findOrFail($request->product["id"]);
        
        if($product["available"] == 0){
            $product->update(['available' => 1]); 
        }else{
            $product->update(['available' => 0]); 
        }

        return Redirect::back();
    }

    public function store(StoreMyProductsRequest $request){

        Product::create(
           [ 
            'product_photo_path' => $request->file('photo') ? $request->file('photo')->store('product-photos') : null,
            'price' => $request->get('price') * 100
           ]
           + $request->validated() 
        );

        return Redirect::back();
 
     }

     public function update(UpdateMyProductsRequest $request, Product $product){
       
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            ]);
        };

        $product->where('id', $request->id)->update(
            [
            'product_photo_path' => $request->file('photo') ? $request->file('photo')->store('product-photos') : Product::where('id', $request->id)->value('product_photo_path'),
            'price' => $request->get('price') * 100
            ]
            + $request->validated() 
        );

        return Redirect::back();
     }

     public function currentProductPhotoDestroy(Request $request){
         
        $product = Product::findOrFail($request["id"]);

        $product->update(['product_photo_path' => null]);

        return Redirect::back();
     }

     public function destroy(Request $request){
         
      $product = Product::findOrFail($request["product_id"]);

      Storage::delete($product->product_photo_path);

      $product->delete();

      return Redirect::back();

     }
}
