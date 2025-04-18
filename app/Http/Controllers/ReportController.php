<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $orders = DB::connection('mysql2')->table('orders')
       // ->join('shipping_detail', 'orders.id', '=', 'shipping_detail.order_id')
        ->where('ordered_date', '>=', now()->subDays(7));
    if ($user->role === 'customer') {
        $orders->where('orders.customer_id', $user->id);
    }
    $orders = $orders->get();
    return view('report.index', compact('orders'));
}
}
