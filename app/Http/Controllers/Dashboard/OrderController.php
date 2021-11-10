<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function orders (Request $request)
    {
        $orders = Order::get();

        if ($request->ajax()) {

            return DataTables::of($orders)
                ->addIndexColumn()

                ->addColumn('status', function ($row) {
                    return $row->status == 0 ? 'معلق' : 'مكتمل';
                })

                ->addColumn('action', function ($row) {
                    $btn = '<td><a href="#" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="عرض" id="viewOrder" class="info box-shadow-2 mb-1 viewOrder" style="width: 80px"><i class="la la-eye font-large-1"></i></a></td>';
                    $btn .= '&nbsp;&nbsp;';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);


        }
        return view('admin.orders.index');
    }

    public function viewOrder (Request $request)
    {
        $order = Order::find($request->id);

        return response()->json($order);
    }

    public function changeStatus (Request $request)
    {

        $order = Order::find($request->id);

        $order->update([
            'status' => $request->type
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'تم تحديث حالة الطلب بنجاح'
        ]);
    }
}
