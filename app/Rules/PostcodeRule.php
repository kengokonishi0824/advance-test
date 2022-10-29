<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PostcodeRule implements Rule
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

    public function passes($attribute, $value)
    {
        return preg_match('/\A\d{3}[-]\d{4}\z/', $value);
    }

    public function message()
    {
        return 'おいおい';
    }
}
