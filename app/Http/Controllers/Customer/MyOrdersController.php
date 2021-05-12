<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use App\Notifications\NewOrderNotification;


class MyOrdersController extends Controller
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
    public function index()
    {
        $orders = Order::where([['user_id', auth()->id()],['basket', 0]])
        ->orderBy('updated_at','desc')
        ->get();
        
        return Inertia::render('Customer/MyOrders', ['orders' => $orders]);
    }

    public function checkoutOrder()
    {
        /* Data come from HandleInertiaRequests */
        if(Order::where([['basket', 1],['user_id', auth()->id()]])->count()){
            
            return Inertia::render('Customer/Checkout');

        }else{
            return Redirect::route('my_orders');
        }
    }
    
    public function checkout(){

        $order = Order::where([['user_id', auth()->id()], ['basket', 1]])
        ->update(['basket' => 0]);

     $user = \App\Models\User::where('name', 'Admin')->firstOrFail();
     
     $user->notify(new NewOrderNotification(auth()->user()));

    return Redirect::route('my_orders')->with('checkout_message', 'Order has been send');
    
}
   
}
