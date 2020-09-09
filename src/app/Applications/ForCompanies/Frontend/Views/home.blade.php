@extends('companies::layouts.main')

@section('title', 'Companies Homepage')

@section('content')
    <h1>Company home</h1>
    <a href="{{ route('companies.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        logout
    </a>
    <form id="logout-form" action="{{ route('companies.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection