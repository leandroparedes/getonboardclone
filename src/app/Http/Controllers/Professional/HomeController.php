<?php

namespace App\Http\Controllers\Professional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * The professional Home Controller
 */
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:professional');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        return view('professional.home', ['user' => $user]);
    }
}