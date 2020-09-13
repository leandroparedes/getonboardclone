<?php

namespace App\Applications\ForCompanies\Controllers;

use App\Applications\ForCompanies\Logic\JobOffers\HasCrudOperations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobOfferController extends Controller
{
    use HasCrudOperations;

    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function guard()
    {
        return Auth::guard('company');
    }
}