@extends('layouts.base')

@section('title', 'Homepage')

@section('base-content')
    <div class="container-fluid">
        <h1 class="text-center mb-4">Getonbrd clon</h1>
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="text-center">For Professionals</h2>
                <div class="text-center">
                    <a role="button" href="{{ route('professionals.showRegisterForm') }}" class="btn btn-outline-primary">Register</a>
                    <a role="button" href="{{ route('professionals.showLoginForm') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
            <div class="col-12 mb-4">
                <h2 class="text-center">For Companies</h2>
                <div class="text-center">
                    <a role="button" href="{{ route('companies.showRegisterForm') }}" class="btn btn-outline-primary">Register</a>
                    <a role="button" href="{{ route('companies.showLoginForm') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
