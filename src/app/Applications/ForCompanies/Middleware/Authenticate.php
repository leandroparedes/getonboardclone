<?php

namespace App\Applications\ForCompanies\Middleware;

use App\Http\Middleware\Authenticate as BaseAuthenticate;

class Authenticate extends BaseAuthenticate
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('companies.showLoginForm');
        }
    }
}