<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reporte</title>
    <style>
        table {
            width: 100%;
            border:none;
            border-radius: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            border:none;
            @if (sizeof($lineas[0]) <= 6)
                font-size: 10px;
            @elseif (sizeof($lineas[0]) <= 8)
                font-size: 9px;
            @else
                font-size: 8px;
            @endif
        }
        th {
            background-color: #0085ff;
            color: #fff;
            border:none;
        }
        tr:nth-child(even) {
            background-color: #e0e0e0;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Reporte</h1>
    <table>
        <thead>
            <tr>
                @foreach (array_keys($lineas[0]) as $key)
                    @if ($key != 'descripcion')
                        <th>{{$key}}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($lineas as $line)
                <tr>
                    @foreach ($line as $key => $value)
                        @if ($key === 'estado')
                            <td>{{$line['descripcion']}}</td>
                        @elseif ($key != 'descripcion')
                            <td>{{$value}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>