<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ContactInformationRequest;
use App\Models\ContactInformation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class ContactInformationController extends Controller
{
    public function index (Request $request)
    {
        $contact_informations = ContactInformation::get();

        if ($request->ajax()) {

            return DataTables::of($contact_informations)
                ->addIndexColumn()


                ->addColumn('action', function ($row) {
                    $url = route('edit.contact_information', $row->id);
                    $btn = '<td><a href="' . $url . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="تعديل" id="editCustomer" class="primary box-shadow-3 mb-1 editContactInformation" style="width: 80px"><i class="la la-edit font-large-1"></i></a></td>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn = $btn . ' <td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="حذف" class="danger box-shadow-3 mb-1 deleteContactInformation" style="width: 80px"><i class="la la-trash font-large-1"></i></a></td>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);


        }
        return view('admin.contactInformation.index');
    }

    public function store(ContactInformationRequest $request)
    {
        DB::beginTransaction();


        $contact_information = ContactInformation::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
        ]);

        $contact_information->save();


        DB::commit();


        return response()->json([
            'status' => true,
            'msg' => 'تم اضافة معلومات التواصل بنجاح'
        ]);
    }

    public function edit($id)
    {
        $contact_information = ContactInformation::find($id);

        $notification = array(
            'message' => 'هذه المعلومة غير موجودة',
            'alert-type' => 'error'
        );

        if (!$contact_information)
            return redirect()->route('index.contact_information')->with($notification);

        return view('admin.contactInformation.edit', compact('contact_information'));
    }

    public function update($id, ContactInformationRequest $request)
    {
        $contact_information = ContactInformation::find($id);

        $notification = array(
            'message' => 'هذه المعلومة غير موجودة',
            'alert-type' => 'error'
        );

        if (!$contact_information)
            return redirect()->route('index.contact_information')->with($notification);

        DB::beginTransaction();


        $contact_information->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
        ]);



        DB::commit();

        $notification = array(
            'message' => 'تم تحديث معلومة التواصل بنجاح',
            'alert-type' => 'info'
        );


        return redirect()->route('index.contact_information')->with($notification);
    }

    public function destroy($id)
    {
        $contact_information = ContactInformation::find($id);

        if (!$contact_information) {
            return response()->json([
                'status' => false,
                'msg' => 'هذه المعلومة غير موجودة',
            ]);
        } else {

            $contact_information->delete();

            return response()->json([
                'status' => true,
                'msg' => 'تم حذف معلومة التواصل بنجاح',
            ]);
        }


    }
}
