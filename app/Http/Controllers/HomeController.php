<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
   public function __construct()
    {
       $this->middleware(['auth:sanctum', 'verified']);
       $this->middleware('is_admin')->except('customerIndex');;
       
    }

   public function adminIndex(){
     
      $order = Order::where('basket', 0)->get();

      $today = today();
      $week = today()->subDays(7);
      $month = today()->subDays(30);
       
      return Inertia::render('Admin/Home', 
         [
            'sales_today' => number_format(Order::total_sales($today) / 100,2, '.',''), 
            'sales_week' => number_format(Order::total_sales($week) / 100,2, '.',''), 
            'sales_month' => number_format(Order::total_sales($month) / 100,2, '.',''),
            'new_customers_week' => User::new_customers($week),
            'new_customers_month' => User::new_customers($month),
            'products_available' => Product::where('available', 1)->count(),
            'products_unavailable' => Product::where('available', 0)->count(),
            'categories_empty' => Category::doesntHave('product')->count(),
            'categories_used' => Category::whereHas('product')->count(),
            'orders_today' => Order::where('basket', 0)->whereDate('updated_at', today())->count(),
            'orders_week' => $order->where('updated_at', '>=', $week)->count(),
            'orders_month' => $order->where('updated_at', '>=', $month)->count(),
         ]
      );
   }

   public function customerIndex(){

      if(auth()->user()->admin_access == true){
         return redirect()->route('admin.home');
      }

      $today = today();
      $month = today()->subDays(30);

      $orders_today = auth()->user()->orders()->where('updated_at', '>=', $today)->count();
      $orders_month = auth()->user()->orders()->where('updated_at', '>=', $month)->count();
      //dd($orders_month);
      return Inertia::render('Customer/Home', ['orders_today' => $orders_today, 'orders_month' => $orders_month]);
 }

}
