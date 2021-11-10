<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'phone' => 'required|max:20',

        ];
    }

    public function messages()
    {
        return[
            'first_name.required' => 'يجب ادخال الاسم الأول',
            'first_name.max' => 'يجب أن لا يتجاوز الاسم الأول عن 200 حرف',
            'last_name.required' => 'يجب ادخال الاسم الأخير',
            'last_name.max' => 'يجب أن لا يتجاوز الاسم الأخير عن 200 حرف',
            'email.required' => 'يرجى ادخال البريد الالكتروني',
            'email.email' => 'يرجى التحقق من صيعة البريد الالكتروني المدخل',
            'email.max' => 'يجب ان لا يتجاوز الايميل عن 200 حرف ',
            'phone.required' => 'يجب ادخال رقم الهاتف',
            'phone.max' => 'يجب أن لا يتجاوز رقم الهاتف عن 20 رقم',

        ];

    }
}
