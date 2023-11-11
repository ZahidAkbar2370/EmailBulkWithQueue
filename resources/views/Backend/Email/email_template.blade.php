<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['subject'] }}</title>
</head>
<body>
    {!! htmlspecialchars_decode($mailData['message']) !!}
</body>
</html>
