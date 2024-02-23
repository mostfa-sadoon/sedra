<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class PhoneWithCountryCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        // Retrieve the values of username and email fields from the request
        $phone = request()->input('phone');
        $country_code = request()->input('country_code');

        // Check if the combination of username and email is unique in the database
        return DB::table('companies')
            ->where([
                ['phone', '=', $phone],
                ['country_code', '=', $country_code],
            ])
            ->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.phone_uniqe');
    }
}
