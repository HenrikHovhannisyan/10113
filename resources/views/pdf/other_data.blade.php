<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Other Form Data</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #222; margin: 0; padding: 0; }
        h2 { text-align: center; margin: 0 0 16px; }

        .record { margin: 0 0 18px; page-break-inside: avoid; }

        .section-title {
            font-weight: bold;
            background: #f3f4f6;
            border: 1px solid #ddd;
            border-bottom: none;
            padding: 8px 10px;
        }

        table.kv {
            width: 100%;
            border-collapse: collapse;
            margin: 0 0 12px;
            page-break-inside: auto;
        }

        table.kv tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        table.kv td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            vertical-align: top;
        }

        table.kv td.k {
            width: 40%;
            font-weight: bold;
            background: #fafafa;
        }

        table.kv tr:nth-child(even) td {
            background: #fcfcfc;
        }

        .muted { color: #666; font-style: italic; }
    </style>
</head>
<body>

@php
    $splitSections = function(array $item): array {
        $scalars = [];
        $sections = [];
        foreach ($item as $k => $v) {
            if (is_array($v)) {
                if (!empty($v)) $sections[$k] = $v;
            } else {
                $scalars[$k] = $v;
            }
        }
        return [$scalars, $sections];
    };
@endphp

@forelse($other as $index => $item)
    @php([$scalars, $sections] = $splitSections($item))

    <div class="record">

        @if(!empty($scalars))
            <div class="section-title">General</div>
            <table class="kv">
                <tbody>
                @foreach($scalars as $label => $value)
                    <tr>
                        <td class="k">{{ $label }}</td>
                        <td class="v">{{ $value }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @foreach($sections as $sectionName => $rows)
            <div class="section-title">{{ $sectionName }}</div>
            <table class="kv">
                <tbody>
                @foreach($rows as $k => $v)
                    @if(is_array($v))
                        <tr>
                            <td class="k" colspan="2">{{ $k }}</td>
                        </tr>
                        @foreach($v as $kk => $vv)
                            <tr>
                                <td class="k">{{ $kk }}</td>
                                <td class="v">{{ is_array($vv) ? json_encode($vv) : $vv }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="k">{{ $k }}</td>
                            <td class="v">{{ $v }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@empty
    <p class="muted">No additional form data.</p>
@endforelse

</body>
</html>
