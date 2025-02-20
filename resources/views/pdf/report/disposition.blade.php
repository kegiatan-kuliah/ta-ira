<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perintah Tugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            padding: 20px;
            border: 1px solid #000;
            max-width: 800px;
            margin: auto;
        }
        .header {
            text-align: center;
        }
        .header h1, .header h2 {
            margin: 5px 0;
        }
        .content {
            margin-top: 20px;
        }
        .bold {
            font-weight: bold;
        }
        .signature {
            float: right;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div>
        <img src="{{ public_path('img/logo-unp.png') }}" alt="" width="70px" height="70px" style="position: absolute; top: 25px;">
        <h3 style="margin-bottom: 0px; text-align: center;">UNIVERSITAS NEGERI PADANG</h3>
        <h1 style="margin-top: 0px; margin-bottom: 0px; text-align: center;">FAKULTAS EKONOMI DAN BISNIS</h1>
        <p style="margin-bottom: 0px; margin-top: 0px; text-align: center;">Jl. Prof. Dr. Hamka, Air Tawar Bar., Kec. Padang Utara, Kota Padang, Sumatera Barat 25132</p>
        <p style="margin-bottom: 0px; margin-top: 0px; text-align: center;">0751445089</p>
        <hr>
    </div>
    <div class="header">
        <h3><u>SURAT PERINTAH TUGAS</u></h3>
        <p>Nomor: {{ $data->letter_disposition_no }}</p>
    </div>

    <div class="content">
        <p><strong>Dasar:</strong> Surat nomor 003/UN35.7.4/TU/2025 dari Prodi Manajemen perihal Penerbitan SK Dekan dan KPA Dosen PA sen Janjun 2025</p>
        <h3 class="bold">MEMERINTAHKAN:</h3>
        <p><strong>Kepada</strong></p>
        <p>Nama: {{ $data->employee->name }}<br>
        Pangkat/Gol: {{ $data->employee->rank }}<br>
        NIP: {{ $data->employee->identity_no }}<br>
        Jabatan: Staff - Umum</p>
        <p><strong>Untuk:</strong> {{ $data->instruction }}</p>
        <p><strong>Waktu:</strong> {{ $data->date }}</p>
        <p><strong>Diindahkan dan dilaksanakan sebagaimana mestinya.</strong></p>
    </div>

    <div class="signature">
        <p>Ditetapkan FEB UNP<br>
        Pada Tanggal 06 Januari 2025<br>
        <strong>Pimpinan FEB UNP</strong></p>
        <br>
        <br>
        <br>
        <p><strong>Prof. Perengki Susanto, SE, M.Sc, Ph.D</strong><br>
        NIP. 1981040420050110</p>
    </div>
    
</body>
</html>
