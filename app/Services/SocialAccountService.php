<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::query()
            ->where('provider', $social)
            ->where('provider_user_id', $providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();

            if($email == null) {
                return false;
            }

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social,
            ]);

            $user = User::whereEmail($email)->first();

            if (! $user) {
                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => Hash::make('12345678'),
                    'email_verified_at' => today('Asia/Jakarta'),
                    'level' => '0',
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
