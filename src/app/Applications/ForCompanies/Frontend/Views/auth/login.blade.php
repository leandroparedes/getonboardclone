<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>