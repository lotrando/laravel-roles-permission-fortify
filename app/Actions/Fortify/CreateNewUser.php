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
            'personal_number'   => ['required', 'string', 'min:5', 'max:5', Rule::unique(User::class)],
            'last_name'         => ['required', 'string', 'max:100'],
            'first_name'        => ['required', 'string', 'max:100'],
            'email'             => ['required', 'string', 'email', 'max:100', Rule::unique(User::class)],
            'password'          => $this->passwordRules(),
        ])->validate();

        return User::create([
            'personal_number' => $input['personal_number'],
            'last_name' => $input['last_name'],
            'first_name' => $input['first_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
