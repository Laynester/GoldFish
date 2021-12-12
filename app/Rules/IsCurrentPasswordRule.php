<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class IsCurrentPasswordRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        return Hash::check($value, auth()->user()->password);
    }

    public function message(): string
    {
        return __('You current password was incorrect.');
    }
}