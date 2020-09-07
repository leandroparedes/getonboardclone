<?php

namespace App\Applications\ForCompanies\Auth;

use Illuminate\Http\Request;

trait RegistersCompanies
{
    protected function showRegisterForm(Request $request)
    {
        return view('companies::auth.register');
    }

    protected function register(Request $request)
    {
        //
    }
}