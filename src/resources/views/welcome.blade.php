@extends('layouts.base')

@section('title', 'Homepage')

@section('base-content')
    <h1>Welcome</h1>
    <a href="{{ route('companies.showLoginForm') }}">Companies login</a>
    <a href="{{ route('companies.showRegisterForm') }}">Companies register</a>
    <a href="{{ route('professionals.showLoginForm') }}">Professionals login</a>
    <a href="{{ route('professionals.showRegisterForm') }}">Professionals register</a>
@endsection
