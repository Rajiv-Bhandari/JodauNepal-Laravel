<!DOCTYPE html>
<html>
<head>
    <title>You have been approved</title>
</head>
<body>
    <p>Hello {{ $technician->fullname }},</p>
    <p>Congratulations! You have been approved in Jodau Nepal as a role for {{ $technician->skill }}</p>
    <p>Your current password is: {{ $password }}</p>
    <p>Change your password now by logging in to our website</p>
</body>
</html>
