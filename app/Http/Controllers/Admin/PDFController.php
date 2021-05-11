<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use App\Models\Order;

class PDFController extends Controller
{

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function openOrderAsPDF(Request $request, $id)
    {
        if(auth()->check()){
            $orders = Order::where('id', $id)
            ->with('user:id,name', 'products:id,name,description,price,size')
            ->withCount('products')
            ->get();
            
            $orders = $orders->map(function($object){
                foreach($object->products as $item){
                $item->total_price = ($item->pivot->quantity * $item->price);
                }
                return $object;
            });

            $total_amount = $orders->sum(function ($product) {
                return $product->products->sum('total_price');
            });

        //return view('Admin/PDF', compact('orders', 'total_amount'));
            $pdf = PDF::loadView('Admin/PDF' , ['orders' => $orders, 'total_amount' => $total_amount]);
            return $pdf->download('invoice.pdf'); 

        }else{
            return abort(403, 'Forbidden');
        }
    }

}
