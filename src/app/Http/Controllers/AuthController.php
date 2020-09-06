<?php

namespace App\Http\Controllers;

use App\Professional;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    const ACCOUNT_TYPE_PROFESIONAL = 'professional';
    const ACCOUNT_TYPE_COMPANY = 'company';

    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function register(Request $request)
    {
        // in which table should we check for email uniqueness
        $table = $request->account_type === self::ACCOUNT_TYPE_COMPANY ? 'companies' : 'professionals';

        $this->validate($request, [
            'account_type' => ['required', 'regex:(professional|company)'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:$table"],
            'password' => ['required', 'string', 'min:8']
        ]);

        $accountType = $request->account_type;

        $model = $accountType === self::ACCOUNT_TYPE_COMPANY ? Company::class : Professional::class;

        $user = $model::create($request->except('account_type'));
        Auth::guard($accountType)->login($user);
        return redirect()->route("$accountType.home");
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'account_type' => ['required', 'regex:(professional|company)'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        
        $credentials = $request->only('email', 'password');

        $accountType = $request->account_type;

        if (Auth::guard($accountType)->attempt($credentials)) {
            return redirect()->route("$accountType.home");
        }

        return redirect()->route('login')->withErrors('Invalid login');
    }

    public function logout(Request $request)
    {
        $this->validate($request, ['account_type' => ['required', 'regex:(professional|company)']]);

        Auth::guard($request->account_type)->logout();

        return redirect()->route('login');
    }
}
