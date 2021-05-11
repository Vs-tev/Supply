<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Order;


class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified','is_admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $customers = User::select(['id', 'name', 'email' , 'profile_photo_path',
            'last_order' => Order::selectRaw('MAX(created_at)')
            ->whereColumn('user_id', '=', 'users.id')
            ->where('basket', '=', 0),
            'open_orders' => Order::selectRaw('COUNT(id)')
            ->where([['status', 0],['basket', 0]])
            ->whereColumn('user_id', '=', 'users.id'),
        ])
        ->with('roles:id,title')
        ->whereHas('roles', function($query) {
            $query->where('title', 'Customer');
        })
        ->withCasts([
            'last_order' => 'datetime:d M Y'
        ])
        ->orderBy('created_at','desc')
        ->get();

        return Inertia::render('Admin/Customers/Customers', ['customers' => $customers]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::select(['id', 'name', 'email', 'created_at'])
        ->where('id', $id)
        ->whereHas('roles', function($query) {
            $query->where('title', 'Customer');
        })
        ->with(['orders' => function ($query){
            $query->select(['user_id', 'id', 'updated_at'])
            ->where('basket', 0)
            ->orderBy('updated_at','desc');
        }])
        ->get();

        return Inertia::render('Admin/Customers/CustomerDeteils', ['customer' => $customer]);
    }


}
