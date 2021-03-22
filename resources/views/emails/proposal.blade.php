<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новая заявка</title>
</head>
<body>

    <h1>Поступила новая заявка на сайте</h1>

    Имя: {{$proposal['first_name']}} <br>
    Фамилия: {{$proposal['last_name']}}<br>
    Телефон: {{$proposal['phone']}}<br>
    email: {{$proposal['email']}}<br>
    text: {{$proposal['textarea']}}<br>
</body>
</html>
