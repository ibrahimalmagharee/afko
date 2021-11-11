<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->latest()->take(10)->get();
        return view('admin.dashboard', compact('orders'));
    }
}
