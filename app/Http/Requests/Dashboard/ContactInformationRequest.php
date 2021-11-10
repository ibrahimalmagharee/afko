<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ContactInformationRequest extends FormRequest
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
            'address' => 'required|max:200',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:200',
            'website' => 'required|max:400',

        ];
    }

    public function messages()
    {
        return[
            'address.required' => 'يجب ادخال العنوان',
            'address.max' => 'يجب أن لا يتجاوز العنوان عن 200 حرف',
            'email.required' => 'يرجى ادخال البريد الالكتروني',
            'email.email' => 'يرجى التحقق من صيعة البريد الالكتروني المدخل',
            'email.max' => 'يجب ان لا يتجاوز الايميل عن 200 حرف ',
            'phone.required' => 'يجب ادخال رقم الهاتف',
            'phone.max' => 'يجب أن لا يتجاوز رقم الهاتف عن 20 رقم',
            'website.required' => 'يجب ادخال الموقع الالكتروني',
            'website.max' => 'يجب أن لا يتجاوز الموقع الالكتروني عن 400 حرف',

        ];

    }
}
