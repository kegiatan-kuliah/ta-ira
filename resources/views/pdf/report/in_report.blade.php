<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Masuk</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background-color: #e0e0e0;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        
    </style>
    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body>
    <h2>Laporan Surat Masuk FEB UNP</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Jenis Surat</th>
                <th>Sifat Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($letters as $index => $letter)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $letter->letter_no }}</td>
                    <td>{{ Carbon::parse($letter->date)->translatedFormat('d F Y') }}</td>
                    <td>{{ $letter->category->name }}</td>
                    <td>{{ $letter->level->name }}</td>
                    <td>{{ $letter->sender }}</td>
                    <td>{{ $letter->subject }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
