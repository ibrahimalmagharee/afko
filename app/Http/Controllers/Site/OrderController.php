<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\OrderRequest;
use App\Models\Background;
use App\Models\ContactInformation;
use App\Models\Logo;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $background = Background::first();
        $logo = Logo::first();
        $contact_information = ContactInformation::first();

        return view('site.order', compact('background', 'logo', 'contact_information'));
    }

    public function sendOrder (OrderRequest $request)
    {
        $order = Order::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
            'identification_number' => $request->identification_number,
            'address' => $request->address,
        ]);

        $order->save();

        return response()->json([
            'status' => true,
            'msg' => 'تم ارسال طلبك بنجاح. انتظر تواصل فريق الدعم الفني لانهاء اجراء الطلب!'
        ]);

    }
}
