<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome {{$user['name']}}</title>
</head>

<body>
    <h1>Hey {{$user['name']}}, welcome to my test site</h1>
    <div>Your email is {{$user['email']}}</div>
</body>
</html>