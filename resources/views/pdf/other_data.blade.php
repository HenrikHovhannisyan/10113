<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Other Form Data</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #ccc; padding: 5px; text-align: left; }
        th { background-color: #f5f5f5; }
        pre { background: #f4f4f4; padding: 5px; }
    </style>
</head>
<body>
<h2>Other Form Data - Tax ID #{{ $tax->id }}</h2>

@foreach($other as $item)
    <h4>Other ID: {{ $item['id'] ?? 'N/A' }}</h4>
    <table>
        @foreach($item as $key => $value)
            <tr>
                <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                <td>
                    @if(is_array($value))
                        <pre>{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                    @else
                        {{ $value }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endforeach
</body>
</html>
