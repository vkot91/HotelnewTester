<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Dear {{$first_name}},your reservation was successfully accepted</h3>
<h4>Its information about your reservation:</h4>
<p>First Name: {{$first_name}}</p>
<p>Second Name: {{$last_name}}</p>
<p>Your address: {{$address}}</p>
<p>Your phone: {{$phone}}</p>
<p>Room: {{$room_id}}</p>
<p>Time of arrival: {{$time_from}}</p>
<p>Time of departure: {{$time_to}}</p>
<p>Price: {{$all_price}} $</p>

<h3>Hotel Kompass Administrator </h3>
</body>
</html>