<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form #{{ $form->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h2 { margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
    </style>
</head>
<body>
<h2>Form ID: {{ $form->id }}</h2>
<p><strong>User:</strong> {{ $form->user->name }}</p>
<p><strong>Email:</strong> {{ $form->user->email }}</p>
<p><strong>Submitted At:</strong> {{ $form->created_at }}</p>

<h3>Form Fields:</h3>
<table>
    <tr><th>Field</th><th>Value</th></tr>
    @foreach($form->data as $key => $value)
        <tr>
            <td>{{ ucfirst($key) }}</td>
            <td>{{ $value }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
