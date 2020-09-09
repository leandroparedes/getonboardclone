<?php

namespace App\Http\Middleware;

use App\Applications\ForCompanies\Models\Company;
use App\Applications\ForProfessionals\Models\Professional;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $currentUser = $this->currentUser($request);

        return $this->redirectPath($currentUser, $request);
    }

    protected function currentUser($request)
    {
        $guards = Arr::only(config('auth.guards'), ['company', 'professional']);

        foreach ($guards as $guard => $config)  {
            if (Auth::guard($guard)->check()) {
                return Auth::guard($guard)->user();
            }
        }

        return null;
    }

    protected function redirectPath($user, $request)
    {
        if ($user instanceof Professional) {
            return route('professionals.home');
        }

        if ($user instanceof Company) {
            return route('companies.home');
        }

        if (! $request->expectsJson()) {
            return route('homepage');
        }
    }
}
