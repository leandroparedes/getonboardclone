<?php

namespace App\Applications\ForCompanies\Controllers;

use App\Applications\ForCompanies\Auth\Authenticates;
use App\Applications\ForCompanies\Auth\Registers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use Authenticates, Registers;

    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
        $this->middleware('guest:professional')->except('logout');
    }

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