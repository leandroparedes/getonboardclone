@extends('layouts.common')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <select name="account_type" id="id-account_type" required>
            <option value="professional">Professional</option>
            <option value="company">Company</option>
        </select>
        <input type="email" name="email" id="id-email" placeholder="email" required>
        <input type="password" name="password" id="id-password" placeholder="password" required>
        <input type="submit" value="Login">
    </form>
@endsection