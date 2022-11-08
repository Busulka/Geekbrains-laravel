<?php

namespace App\Http\Controllers;
use App\Services\Contracts\Social;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymphonyRedirectResponse;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymphonyRedirectResponse | RedirectResponse
    {
    return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social):Redirector | Application | RedirectResponse
    {
        return redirect($social->loginAndGetRedirectUrl(Socialite::driver($driver)->user()));
    }
}
