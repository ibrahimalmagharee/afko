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
            'country' => 'required|max:100',
            'city' => 'required|max:100',
            'identification_number' => 'required|digits_between:1,50|numeric',
            'address' => 'required|max:200',


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
            'country.required' => 'يجب اختيار الدولة',
            'country.max' => 'يجب أن لا تتجاوز الدولة عن 100 حرف',
            'city.required' => 'يجب اختيار المدينة ',
            'city.max' => 'يجب أن لا تتجاوز المدينة عن 100 حرف',
            'identification_number.required' => 'يجب ادخال رقم الهوية',
            'identification_number.digits_between' => 'يجب أن لا يتجاوز رقم الهوية عن 50 رقم',
            'identification_number.numeric' => 'يجب أن يكون نوع رقم الهوية رقم',
            'address.required' => 'يجب ادخال العنوان',
            'address.max' => 'يجب أن لا يتجاوز العنوان عن 200 حرف',

        ];

    }
}
