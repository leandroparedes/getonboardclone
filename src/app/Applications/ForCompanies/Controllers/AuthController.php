<?php

namespace App\Applications\ForCompanies\Controllers;

use App\Applications\ForCompanies\Auth\AuthenticatesCompanies;
use App\Applications\ForCompanies\Auth\RegistersCompanies;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesCompanies, RegistersCompanies;
}