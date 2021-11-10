<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ImageRequest;
use App\Models\Background;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class BackgroundController extends Controller
{
    public function index (Request $request)
    {
        $backgrounds = Background::get();

        if ($request->ajax()) {

            return DataTables::of($backgrounds)
                ->addIndexColumn()

                ->addColumn('photo', function ($row){
                    return '<img src="' . $row->getImage($row->photo) . '" border="0" style="width: 100px; height: 90px;" class="img-rounded" align="center" />';

                })

                ->addColumn('action', function ($row) {
                    $url = route('edit.background', $row->id);
                    $btn = '<td><a href="' . $url . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="تعديل" id="editCustomer" class="primary box-shadow-3 mb-1 editBackground" style="width: 80px"><i class="la la-edit font-large-1"></i></a></td>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn = $btn . ' <td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="حذف" class="danger box-shadow-3 mb-1 deleteBackground" style="width: 80px"><i class="la la-trash font-large-1"></i></a></td>';
                    return $btn;
                })
                ->rawColumns(['action', 'photo'])
                ->make(true);


        }
        return view('admin.background.index');
    }

    public function store(ImageRequest $request)
    {
        DB::beginTransaction();
        $filePath = '';
        if ($request->has('photo')){
            $filePath = uploadImage('background', $request->photo);
        }

        $background = Background::create([
            'photo' => $filePath
        ]);

        $background->save();


        DB::commit();


        return response()->json([
            'status' => true,
            'msg' => 'تم اضافة الصورة بنجاح'
        ]);
    }

    public function edit($id)
    {
        $background = Background::find($id);

        $notification = array(
            'message' => 'هذه الصورة غير موجودة',
            'alert-type' => 'error'
        );

        if (!$background)
            return redirect()->route('index.background')->with($notification);

        return view('admin.background.edit', compact('background'));
    }

    public function update($id, ImageRequest $request)
    {
        $background = Background::find($id);

        $notification = array(
            'message' => 'هذه الصورة غير موجودة',
            'alert-type' => 'error'
        );

        if (!$background)
            return redirect()->route('index.background')->with($notification);

        DB::beginTransaction();

        $filePath = '';
        if ($request->has('photo')){
            $image_path = public_path('assets/images/admin/background/') . $background->photo;
            unlink($image_path);

            $filePath = uploadImage('background', $request->photo);

            $background->update([
                'photo' => $filePath
            ]);
        }


        DB::commit();

        $notification = array(
            'message' => 'تم تحديث الصورة بنجاح',
            'alert-type' => 'info'
        );


        return redirect()->route('index.background')->with($notification);
    }

    public function destroy($id)
    {
        $background = Background::find($id);

        if (!$background) {
            return response()->json([
                'status' => false,
                'msg' => 'هذه الصورة غير موجودة',
            ]);
        } else {
            $image_path = public_path('assets/images/admin/background') . '/' . $background->photo;
            unlink($image_path);
            $background->delete();

            return response()->json([
                'status' => true,
                'msg' => 'تم حذف الصورة بنجاح',
            ]);
        }


    }
}
