<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = $this->findOrCreateUser($googleUser, 'google');
        Auth::login($user, true);

        return redirect()->intended('/dashboard');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $user = $this->findOrCreateUser($facebookUser, 'facebook');
        Auth::login($user, true);

        return redirect()->intended('/dashboard');
    }

    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = $this->findOrCreateUser($githubUser, 'github');
        Auth::login($user, true);

        return redirect()->intended('/dashboard');
    }

    protected function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('provider_id', $socialUser->getId())
                    ->where('provider', $provider)
                    ->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ]);
        }

        return $user;
    }
}
