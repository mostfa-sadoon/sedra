<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneWithCountryCode;

class StoreCompany extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name'                        => 'required|unique:companies',
            'password'                    => 'required|min:6|max:50|confirmed',
            'password_confirmation'        => 'required|max:50|min:6',
            //'phone'                       =>'required|unique:companies',
            'phone'                       => ['required', new PhoneWithCountryCode],
             'account_number'              => 'required|unique:company_bank_accounts',
             //'bank_name'                   => 'required',
             'email'                       => 'required|unique:companies',
             'country_code'                => 'required',
             'img'                        => 'required'
        ];
    }

    public function messages()
    {
        return [

             'name.unique'                      => __('validation.name_uniqe'),
             'phone.unique'                     => __('validation.phone_unique'),
             'account_number.unique'            =>__('validation.account_number'),
             'email.unique'                     =>__('validation.email_unique'),
             'password.confirmed'               =>__('validation.password_confirmed')

        ];
    }
}
