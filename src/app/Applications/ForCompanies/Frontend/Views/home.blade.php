<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Company home</h1>
    <a href="{{ route('companies.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        logout
    </a>
    <form id="logout-form" action="{{ route('companies.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>