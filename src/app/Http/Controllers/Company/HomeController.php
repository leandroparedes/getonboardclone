<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * The company Home Controller
 */
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        return view('company.home', ['user' => $user]);
    }
}
