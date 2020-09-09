@extends('professionals::layouts.main')

@section('title', 'Professionals Homepage')

@section('content')
    <h1>Professionals home</h1>
    <a href="{{ route('professionals.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        logout
    </a>
    <form id="logout-form" action="{{ route('professionals.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <example-component></example-component>
@endsection