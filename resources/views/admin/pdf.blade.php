<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Siswa Academy Les
    </title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1{
            text-align: center;
            margin-bottom: 5px;
        }

        p{
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td{
            border: 1px solid #000;
            padding: 8px;
        }

        th{
            background-color: #e5e7eb;
        }

        .text-center{
            text-align: center;
        }

    </style>

</head>

<body>

    <h1>
        LAPORAN PENDAFTARAN SISWA
    </h1>

    <p>
        Academy Les - TK, SD, dan SMP
    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Nama Anak</th>
                <th>Orang Tua</th>
                <th>Jenjang</th>
                <th>Mata Pelajaran</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach($siswas as $siswa)

            <tr>

                <td class="text-center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $siswa->nama_anak }}
                </td>

                <td>
                    {{ $siswa->nama_orang_tua }}
                </td>

                <td>
                    {{ $siswa->jenjang }}
                </td>

                <td>
                    {{ $siswa->mata_pelajaran }}
                </td>

                <td>
                    {{ ucfirst($siswa->status) }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <br>

    <p style="text-align:right;">
    Dicetak pada:
    {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y H:i') }} WIB
</p>

</body>

</html>