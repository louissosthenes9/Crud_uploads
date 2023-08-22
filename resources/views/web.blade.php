<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <p>congrats!!!</p>
    @else
    <form action="/register" method ="POST">
        @csrf
    <label for="name">name</label>
    <input type="text" name="name">

    <label for="password">password</label>
    <input type="password" name="password">

    <label for="email">email</label>
    <input type="email" name="email">

     <button>submit</button>
</form>
    @endauth
    
</body>
</html>
