@extends('layouts.common')

@section('title', 'Register')

@section('content')
    <h1>Register</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('register') }}" method="post">
        @csrf
        <select name="account_type" id="id-account_type" required>
            <option value="professional">Professional</option>
            <option value="company">Company</option>
        </select>
        <input type="text" name="name" id="id-name" placeholder="name" required>
        <input type="email" name="email" id="id-email" placeholder="email" required>
        <input type="password" name="password" id="id-password" placeholder="password">
        <input type="submit" value="Register">
    </form>

    <a href="{{ route('login') }}">Login</a>
@endsection