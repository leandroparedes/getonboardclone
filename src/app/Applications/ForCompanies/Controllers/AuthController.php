<?php

namespace App\Applications\ForCompanies\Controllers;

use App\Applications\ForCompanies\Auth\AuthenticatesCompanies;
use App\Applications\ForCompanies\Auth\RegistersCompanies;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesCompanies, RegistersCompanies;

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }
}