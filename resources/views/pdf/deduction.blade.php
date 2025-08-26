<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Deduction Form #{{ $form->id }}</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
<h2>Deduction Form - ID: {{ $form->id }}</h2>
<table>
    <tbody>
    @foreach($form->toArray() as $key => $value)
        @if(!in_array($key, ['id','tax_return_id','created_at','updated_at']))
        <tr>
            <th>{{ ucwords(str_replace('_',' ',$key)) }}</th>
            <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
</body>
</html>
