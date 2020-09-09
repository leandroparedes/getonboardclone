@extends('companies::layouts.main')

@section('title', 'Login for companies')

@section('content')
    <h1>Company login</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('companies.login') }}" method="POST">
        @csrf
        <input type="email" name="email" id="id-email" placeholder="company admin email">
        <input type="password" name="password" id="id-password" placeholder="password">
        <input type="submit" value="Login as company">
    </form>
@endsection