<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use PDF;
use App\Models\Order;

class OrdersController extends Controller
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
        
        $orders = Order::where('basket', 0)->with('user')->orderBy('updated_at', 'desc')->get();

        $count_orders = $orders->count();
        $orders_today = Order::where('basket', 0)->whereDate('updated_at', today())->count();
        $status_executed = $orders->where('status', 1)->count();
        $status_open = $orders->where('status', 0)->count();

        return Inertia::render('Admin/Orders/Orders', ['orders' => $orders, 'count_orders' => $count_orders, 'status_executed' => $status_executed, 'status_open' => $status_open, 'orders_today' => $orders_today]);

    }

    public function orderStatusChange(Request $request){

        $order = Order::findOrFail($request->id);

        if($order["status"] == 0){
            $order->update(['status' => 1]); 
        }else{
            $order->update(['status' => 0]); 
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)
        ->with('user:id,name', 'products:id,name,description,price,size')
        ->withCount('products')
        ->get();
        
        $order = $order->map(function($object){
            foreach($object->products as $item){
               $item->total_price = ($item->pivot->quantity * $item->price);
            }
            return $object;
        });

        $total_amount = $order->sum(function ($product) {
            return $product->products->sum('total_price');
        });

        return Inertia::render('Admin/Orders/CurrentOrder', ['order' => $order, 'total_amount' => $total_amount]);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
