<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'pernum'            => ['required', 'string', 'min:5', 'max:5', Rule::unique(User::class)],
            'user_name'         => ['required', 'string', 'max:100'],
            'email'             => ['required', 'string', 'email', 'max:100', Rule::unique(User::class)],
            'date_birth'        => ['nullable'],
            'password'          => $this->passwordRules(),
        ])->validate();

        return User::create([
            'pernum'            => $input['pernum'],
            'user_name'         => $input['user_name'],
            'email'             => $input['email'],
            'date_birth'        => $input['date_birth'],
            'email'             => $input['email'],
            'password'          => Hash::make($input['password']),
        ]);
    }
}
