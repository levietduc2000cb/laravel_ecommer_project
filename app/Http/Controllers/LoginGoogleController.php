<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Exception;

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

            $finduser = Users::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/');

            }else{
                $newUser = Users::create([
                    'fullName' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('12345678')
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            error_log($e);
            dd($e->getMessage());
        }
    }
}
