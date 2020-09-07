<?php

namespace App\Rules;

use App\Applications\Countries;
use Illuminate\Contracts\Validation\Rule;

class CountryCode implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Countries::exists($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given country code is invalid.';
    }
}
