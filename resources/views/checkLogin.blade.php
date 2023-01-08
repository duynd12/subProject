<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form method="post" action="{{route('admin-login1')}}">
    @csrf <!-- {{ csrf_field() }} -->
    <input name="email">
    <input name="password">
    <input type="submit">
</form>

<body>

</body>

</html>