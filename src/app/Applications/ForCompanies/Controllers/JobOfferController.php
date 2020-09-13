<?php

namespace App\Applications\ForCompanies\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Applications\ForCompanies\Logic\JobOffers\Store;
use App\Applications\ForCompanies\Logic\JobOffers\Update;
use App\Applications\ForCompanies\Logic\JobOffers\Delete;
use App\Applications\ForCompanies\Logic\JobOffers\Lists;
use Illuminate\Support\Facades\Auth;

class JobOfferController extends Controller
{
    use Store, Update, Delete, Lists;

    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function guard()
    {
        return Auth::guard('company');
    }
}