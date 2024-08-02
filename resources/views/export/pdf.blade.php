<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan - {{ config('app.name') }}</title>
    <style>
        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid;
            padding: 2px;
        }
    </style>
</head>

<body>
    <p>Total Wisata : {{ count($data['wisata']) }}</p>
    <p>Total Akomodasi : {{ count($data['akomodasi']) }}</p>
    <p>Total User : {{ count($data['user']) }}</p>
    <h2 style="width: 100%;text-align: center">Data Wisata</h2>
    <table style="margin: 0 auto;margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['wisata'] as $row)
                <tr>
                    <td style="padding: 2px;text-align: center">{{ $loop->iteration }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->nama }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->kategori }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->lat }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->lng }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 style="width: 100%;text-align: center">Data Akomodasi</h2>
    <table style="margin: 0 auto;margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['akomodasi'] as $row)
                <tr>
                    <td style="padding: 2px;text-align: center">{{ $loop->iteration }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->nama }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->alamat }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->lat }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->lng }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 style="width: 100%;text-align: center">Data User</h2>
    <table style="margin: 0 auto;margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['user'] as $row)
                <tr>
                    <td style="padding: 2px;text-align: center">{{ $loop->iteration }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->name }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->email }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->umur }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->jenis_kelamin }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->pekerjaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
