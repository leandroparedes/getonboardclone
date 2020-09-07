<?php

namespace App\Applications\ForCompanies\Auth;

use Illuminate\Http\Request;

trait AuthenticatesCompanies
{
    protected function showLoginForm(Request $request)
    {
        return view('companies::auth.login');
    }

    protected function login(Request $request)
    {
        //
    }
}