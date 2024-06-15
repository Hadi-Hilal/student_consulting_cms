<!DOCTYPE html>
<html lang="en">
<head>
    <title>Universities PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>{{env('APP_NAME')}}</h1>
    <table>
        <thead>
            <tr>
                <th>University</th>
                <th>University Program</th>
                <th>University Fees</th>
            </tr>
        </thead>
        <tbody>
            @foreach($program->universities as $university)
                <tr>
                    <td>{{ $university->getTranslation('title', 'en') }}</td>
                    <td>{{ $program->getTranslation('name', 'en') }}</td>
                    <td>{{ $university->disc_price }} $</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
