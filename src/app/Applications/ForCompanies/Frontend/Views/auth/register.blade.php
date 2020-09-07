<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Company register</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('companies.register') }}" method="POST">
        @csrf
        <input type="text" name="name" id="id-name" placeholder="company name">
        <select name="country_code" id="id-country_code">
            <option value="" selected disabled hidden>Select country</option>
            @foreach ($countries as $item)
                <option value="{{ $item['code'] }}">{{ $item['country'] }}</option>
            @endforeach
        </select>
        <input type="email" name="email" id="id-email" placeholder="company admin email">
        <input type="password" name="password" id="id-password" placeholder="password">
        <input type="password" name="password_confirmation" id="id-password-confirmation" placeholder="password confirmation">
        <input type="submit" value="Register company">
    </form>
</body>
</html>