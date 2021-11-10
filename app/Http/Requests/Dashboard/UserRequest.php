<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required|max:200',
            'national_Id' => 'required|digits_between:1,20|unique:users,national_Id,'. $this -> id,
            'telephone_number' => 'required|digits_between:7,15|unique:users,telephone_umber,'. $this -> id,
            'region_id' => 'required|numeric|exists:regions,id',
            'town_id' => 'required|numeric|exists:towns,id',
            'email' => 'required|email|max:100|unique:users,email,'. $this -> id,
            'user_name' => 'required|max:200|unique:users,email,'. $this -> id,
            'password' => 'required|confirmed|min:4|max:50',
        ];
    }

    public function messages()
    {
        return[
            'full_name.required' => 'يرجى ادخال الاسم كاملا',
            'full_name.max' => 'يجب ان لا يتجاوز الاسم عن 200 حرف ',
            'national_Id.required' => 'يرجى ادخال رقم الهوية',
            'national_Id.digits_between' => 'يجب ان لا يتجاوز رقم الهوية عن 20 رقم ولا يقل عن 5 ارقام ',
            'national_Id.unique' => 'هذا الرقم مسجل باسم شخص من قبل',
            'telephone_number.required' => 'يرجى ادخال رقم الهاتف',
            'telephone_number.digits_between' => 'يجب ان لا يتجاوز رقم الهاتف عن 15 رقم ولا يقل عن 7 ارقام ',
            'telephone_number.unique' => 'هذا الرقم مسجل باسم شخص من قبل',
            'region_id.required' => 'يجب اختيار المنطقة',
            'region_id.numeric' => 'يجب ان تكون ثيمة المنطقة رقم',
            'region_id.exists' => 'هذه المنطقة غير مسجلة في النظام',
            'town_id.required' => 'يجب اختيار البلد',
            'town_id.numeric' => 'يجب ان تكون ثيمة البلد رقم',
            'town_id.exists' => 'هذا البلد غير مسجل في النظام',
            'email.required' => 'يرجى ادخال البريد الالكتروني',
            'email.email' => 'يرجى التحقق من صيعة البريد الالكتروني المدخل',
            'email.unique' => 'هذا الايميل موجود من قبل يرجى التحقق من البريد الالكتروني االمدخل',
            'user_name.required' => 'يرجى ادخال الاسم المستخدم',
            'user_name.max' => 'يجب ان لا يتجاوز اسم المستخدم عن 200 حرف ',
            'user_name.unique' => 'هذا الاسم مسجل باسم شخص من قبل قبل يرجى التحقق من الاسم االمدخل',
            'password.required' => 'يجب ادخال كلمة المرور',
            'password.min' => 'كلمة المرور يجب ان لا تقل عن 4 أحرف أو أرقام',
            'password.max' => 'كلمة المرور يجب ان لا تزيد عن 50 حرف أو رقم',
            'password.confirmed' => 'كلمة المرور غير متطابقة يرجى التأكد منها',
        ];

    }
}
