<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrollment PDF</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            color: #343a40;
            line-height: 1;
            display: flex;
            justify-content: center;
        }

        table {
            width: 800px;
            padding: 20px;
            margin-top: 30px;
            /* border: 1px solid #343a40; */
            border-collapse: collapse;
            font-size: 18px;
        }

        th,
        td {
            /* border: 1px solid #343a40; */
            padding: 16px 24px;
            text-align: left;
        }

        thead th {
            background-color: #087f5b;
            color: #fff;
            width: 25%;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center;margin-top:20px"> Data Enrollments</h2>
    <div class="table1">
        <table>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Matakuliah</th>
                    <th scope="col">Nama Matakuliah</th>
                    <th scope="col">Jumlah SKS</th>
                    <th scope="col">Dosen Pengampu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <th scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $enrollment->matakuliah->kode_mk }}</td>
                        <td>{{ $enrollment->matakuliah->name }}</td>
                        <td>{{ $enrollment->matakuliah->sks }}</td>
                        <td>{{ $enrollment->matakuliah->dosen->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>
