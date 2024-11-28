<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()

    {

        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            $finduser = User::where('google_id', $user->id)->first();
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->intended('/trang-chu');
            } else if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/trang-chu');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('123456789'),
                    'password' => encrypt('123456789'),
                    'password' => encrypt('123456789'),
                    'google_id' => $user->id,
                ]);
                Auth::login($newUser);

                return redirect()->intended('/trang-chu');
            }
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
}
