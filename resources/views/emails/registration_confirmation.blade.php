<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body>
    <h1>Hello {{ $name }},</h1>
    <p>You have successfully registered for <strong>{{ $event->name }}</strong>.</p>
    <p><strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }}</p>
    <p><strong>Location:</strong> {{ $event->venue->name ?? 'Online' }}</p>
    <p>We look forward to seeing you!</p>
</body>
</html>
