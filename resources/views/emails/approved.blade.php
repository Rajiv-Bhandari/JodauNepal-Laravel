<!DOCTYPE html>
<html>
<head>
    <title>You have been approved</title>
</head>
<body>
    <p>Hello {{ $technician->fullname }},</p>
    <p>Congratulations! You have been approved in Jodau Nepal as a role for {{ $technician->skill }}</p>
    <p>Your current password is: {{ generateRandomPassword() }}</p>
    <h1>Change your password now by logging in to our website</h1>
</body>
</html>

@php
function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
}
@endphp
