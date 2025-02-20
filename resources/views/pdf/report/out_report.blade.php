<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar</title>
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

        .signature {
            float: right;
            margin-top: 40px;
        }
        
    </style>
    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body>
    <div>
        <img src="{{ public_path('img/logo-unp.png') }}" alt="" width="70px" height="70px" style="position: absolute; top: 15px;">
        <h3 style="margin-bottom: 0px; text-align: center;">UNIVERSITAS NEGERI PADANG</h3>
        <h1 style="margin-top: 0px; margin-bottom: 0px; text-align: center;">FAKULTAS EKONOMI DAN BISNIS</h1>
        <p style="margin-bottom: 0px; margin-top: 0px; text-align: center;">Jl. Prof. Dr. Hamka, Air Tawar Bar., Kec. Padang Utara, Kota Padang, Sumatera Barat 25132</p>
        <p style="margin-bottom: 0px; margin-top: 0px; text-align: center;">0751445089</p>
        <hr>
    </div>
    <h2 style="text-align: center;">Laporan Surat Keluar FEB UNP</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Tujuan</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($letters as $index => $letter)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $letter->letter_no }}</td>
                    <td>{{ Carbon::parse($letter->date)->translatedFormat('d F Y') }}</td>
                    <td>{{ $letter->recipient }}</td>
                    <td>{{ $letter->subject }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Tidak Ada Data</td>
                </tr>

            @endforelse
        </tbody>
    </table>
    <div class="signature">
        {{ Carbon::now()->translatedFormat('d F Y')}}<br>
        <strong>Agendaris FEB UNP</strong></p>
        <br>
        <br>
        <br>
        <p><strong>Alamsyah</strong><br>
        NIP. 196804012007011001</p>
    </div>
</body>

</html>
