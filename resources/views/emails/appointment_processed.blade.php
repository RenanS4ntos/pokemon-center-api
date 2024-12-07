<!DOCTYPE html>
<html>

<head>
  <title>Appointment Processed</title>
</head>

<body>
  <h1>Your Appointment has been Processed</h1>
  <p>Dear {{ $appointment->user->name }},</p>
  <p>Your appointment scheduled for {{ $appointment->scheduled_at }} has been processed.</p>
  <p>Thank you!</p>
</body>

</html>