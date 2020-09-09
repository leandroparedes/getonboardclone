@extends('professionals::layouts.main')

@section('title', 'Login for professionals')

@section('content')
    <h1>Professional login</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('professionals.login') }}" method="POST">
        @csrf
        <input type="email" name="email" id="id-email" placeholder="professional email">
        <input type="password" name="password" id="id-password" placeholder="password">
        <input type="submit" value="Login as professional">
    </form>
@endsection