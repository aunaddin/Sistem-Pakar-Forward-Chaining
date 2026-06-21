<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>Hasil Diagnosis</title>

    <style>

        body{
            font-family: sans-serif;
        }

        .title{
            text-align: center;
            margin-bottom: 30px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        td{
            padding: 8px;
            vertical-align: top;
        }

        .gambar{
            margin-top: 20px;
            width: 250px;
        }

    </style>

</head>

<body>

    <div class="title">

        <h2>HASIL DIAGNOSIS PAKIRO</h2>

        <p>Sistem Pakar Penyakit Kopi Robusta</p>

    </div>

    <table>

        <tr>
            <td width="200">Nama Pasien</td>
            <td>: {{ $diagnosa->nama_pasien }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>: {{ $diagnosa->alamat }}</td>
        </tr>

        <tr>
            <td>Tanggal Diagnosis</td>
            <td>: {{ $diagnosa->created_at->format('d-m-Y H:i') }}</td>
        </tr>

    </table>

    <hr>

    @if($diagnosa->penyakit)

        <h3>
            {{ $diagnosa->penyakit->nama_penyakit }}
        </h3>

        @if($diagnosa->penyakit->gambar)

            <img src="{{ public_path('storage/' . $diagnosa->penyakit->gambar) }}"
                 class="gambar">

        @endif
        
        <h4>Deskripsi</h4>
        <p>
            {{ $diagnosa->penyakit->deskripsi }}
        </p>

        <h4>Penanganan</h4>

        <p>
            {{ $diagnosa->penyakit->penanganan }}
        </p>

    @else

        <p>Penyakit tidak ditemukan</p>

    @endif

</body>
</html>