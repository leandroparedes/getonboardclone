@extends('professionals::layouts.main')

@section('title', 'Register as professional')

@section('content')
    <h1>Professional register</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('professionals.register') }}" method="POST">
        @csrf
        <input type="text" name="name" id="id-name" placeholder="professional name">
        <select name="country_code" id="id-country_code">
            <option value="" selected disabled hidden>Select country</option>
            @foreach ($countries as $item)
                <option value="{{ $item['code'] }}">{{ $item['country'] }}</option>
            @endforeach
        </select>
        <input type="email" name="email" id="id-email" placeholder="professional email">
        <input type="password" name="password" id="id-password" placeholder="password">
        <input type="password" name="password_confirmation" id="id-password-confirmation" placeholder="password confirmation">
        <input type="submit" value="Register professional">
    </form>
@endsection