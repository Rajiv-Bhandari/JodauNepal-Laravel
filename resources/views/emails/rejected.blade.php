<!DOCTYPE html>
<html>
<head>
    <title>Request Rejected</title>
</head>
<body>
    <p>Hello {{ $technician->fullname }},</p>
    <p>We regret to inform you that your request has been rejected for the role of {{ $technician->skill }}.</p>
    <p>Rejection Message: {{ $technician->rejectmessage }}</p>
    <p>You can contact our support team for further details</p>
</body>
</html>
