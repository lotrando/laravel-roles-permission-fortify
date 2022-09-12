<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'pernum'            => ['required', 'string', 'min:5', 'max:5', Rule::unique('users')->ignore($user->id)],
            'user_name'         => ['required', 'string', 'max:100'],
            'date_birth'        => ['nullable', 'string', 'max:100'],
            'email'             => ['required', 'string', 'email', 'max:100', Rule::unique('users')->ignore($user->id)],
        ])->validateWithBag('updateProfileInformation');

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'pernum'            => $input['pernum'],
                'user_name'         => $input['user_name'],
                'date_birth'        => $input['date_birth'],
                'email'             => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'pernum'            => $input['pernum'],
            'user_name'         => $input['user_name'],
            'date_birth'        => $input['date_birth'],
            'email'             => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
