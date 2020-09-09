<?php

namespace App\Applications\ForCompanies\Auth;

use App\Applications\Countries;
use App\Applications\ForCompanies\Models\Company;
use App\Rules\CountryCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait Registers
{
    use Redirects;

    protected function showRegisterForm(Request $request)
    {
        $countries = Countries::all();

        return view('companies::auth.register', ['countries' => $countries]);
    }

    protected function register(Request $request)
    {
        $this->validateRegister($request);

        $company = $this->create($request->all());

        $this->guard()->login($company);

        return $this->registered($request, $company) ?: redirect($this->authSuccessRedirectPath());
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    protected function validateRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'size:3', new CountryCode],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies', 'unique:professionals'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Applications\ForCompanies\Models\Company
     */
    protected function create(array $data)
    {
        return Company::create([
            'name' => $data['name'],
            'country_code' => $data['country_code'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}