<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return view('site.order');
    }

    public function sendOrder (OrderRequest $request)
    {
        $order = Order::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $order->save();

        return response()->json([
            'status' => true,
            'msg' => 'تم ارسال طلبك بنجاح. انتظر تواصل فريق الدعم الفني لانهاء اجراء الطلب!'
        ]);

    }
}
