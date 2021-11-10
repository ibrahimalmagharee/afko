<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

            $notification = array(
                'message' => 'تم تسجيل دخولك بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);;
        }

        $notification = array(
            'message' => 'هناك خطأ بالبيانات يرجى التحقق',
            'alert-type' => 'error'
        );

        return redirect() -> back()->with($notification);
    }

    public function logout()
    {
        $guard = $this->getGuard();
        $guard->logout();

        $notification = array(
            'message' => __('admin/login.signed_out_successfully'),
            'alert-type' => 'success'
        );
        return redirect() ->route('admin.login.page')->with($notification);
    }

    private function getGuard()
    {
        return auth();
    }
}
