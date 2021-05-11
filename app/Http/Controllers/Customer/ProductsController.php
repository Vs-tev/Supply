<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class ProductsController extends Controller
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
       
        $categories = Category::withCount(['product' => function ($query){
            $query->where('available', 1);
        }])
        ->whereHas('product', function ($query) {
            $query->where('available', 1);
        })
        ->get();
               
        return Inertia::render('Customer/Products/Products', 
        [
            'categories' => $categories, 
            'products' => Product::where('available', 1)->with('category:id,name')
                ->with(['orders' => function($query){
                    $query->where([['basket', 1], ['user_id', auth()->id()]]);
                }])
                ->getproducts($request->all())
                ->paginate()
        ]);
        
    }

    public function addProductToBasket(Request $request){

       $order = Order::updateOrCreate(
            ['user_id' => auth()->id(), 'basket' => 1],
            ['user_id' => auth()->id()]
        );
       
        $order->products()->attach($order, array('quantity' => $request->quantity, 'product_id' => $request->id));

        return Redirect::back(); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeProducFromBasket(Request $request)
    {   
    
        $order = Order::where([['basket', 1], ['user_id', auth()->id()]])->firstOrFail();
       
        $order->products()->wherePivot('product_id', $request->id)->detach();

        if(!$order->products()->count()){
            $order->delete();
        }

        return Redirect::back(); 
    }

    public function removeAllFromBasket()
    {   
        $order = Order::where([['basket', 1], ['user_id', auth()->id()]])->firstOrFail();
        
        $order->products()->detach();

        $order->delete();

        return Redirect::back(); 
    }
}


