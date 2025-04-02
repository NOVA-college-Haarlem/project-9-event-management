<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Feedback Received</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 30px;">
        <h2 style="color: #2c3e50;">📩 New Feedback Submitted</h2>
        <p style="font-size: 16px; color: #34495e;">You’ve received new feedback for the following event:</p>

        <h3 style="color: #2980b9; margin-top: 10px;">{{ $event->name }}</h3>

        <table style="margin-top: 20px; font-size: 15px;">
            <tr>
                <td style="padding-right: 10px;"><strong>🗓 Date & Time:</strong></td>
                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }}</td>
            </tr>
            <tr>
                <td><strong>📍 Location:</strong></td>
                <td>{{ $event->venue->name ?? 'Online' }}</td>
            </tr>
        </table>

        <hr style="margin: 30px 0;">

        <h4 style="color: #2c3e50;">📝 Feedback:</h4>
        <p style="font-size: 15px; color: #2c3e50;">{{ $feedback }}</p>

        <hr style="margin-top: 40px;">
        <p style="font-size: 13px; color: #999;">This message was automatically sent by your Laravel app.</p>
    </div>
</body>
</html>
