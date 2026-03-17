<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request Accepted</title>
</head>
<body>
    <h1>Adoption Request Accepted</h1>
    <p>Dear {{ $details['user_name'] }},</p>
    <p>Your adoption request for the pet named {{ $details['pet_name'] }} has been accepted.</p>
    <p>Here are the details:</p>
    <ul>
        <li>Pet Name: {{ $details['pet_name'] }}</li>
        <li>Contact Phone: {{ $details['user_phone'] }}</li>
        <li>Pet Details: {{ $details['pet_details'] }}</li>
        <li>Pet Posion: <a href="{{ $details['pet_lien'] }}"> {{ $details['pet_lien'] }}</a></li>
    </ul>
    <p>Thank you for your interest in adopting a pet!</p>
</body>
</html>
