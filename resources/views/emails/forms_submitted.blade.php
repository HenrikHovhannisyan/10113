<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tax Forms Submitted</title>
</head>
<body>
<p>Hello Manager,</p>

<p>User <strong>{{ $tax->user->name }}</strong> ({{ $tax->user->email }}) has submitted Tax Return ID <strong>#{{ $tax->id }}</strong>.</p>

<p>The related forms are attached as PDFs.</p>

<p>Best regards,<br>Your Application</p>
</body>
</html>
