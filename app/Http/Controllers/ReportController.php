<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $user = auth()->user();
      // dd( $user->getRoleNames());
        $orders = DB::connection('mysql2')->table('orders')
            ->leftJoin('shipping_details', 'orders.id', '=', 'shipping_details.order_id')
            ->where('ordered_date', '>=', now()->subDays(7));
        if (auth()->user()->hasRole('customer')) { 
            $orders->where('orders.customer_id', $user->id);
        }
       /* if ($user->role === 'customer') {
            $orders->where('orders.customer_id', $user->id);
        }*/
        $orders = $orders->get();
        return view('report.index', compact('orders'));
    }
}
