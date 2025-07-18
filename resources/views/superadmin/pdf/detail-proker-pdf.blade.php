<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Detail Proker UKM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table,
        th,
        td {
            border: 1px solid #444;
        }

        th,
        td {
            padding: 8px 10px;
            text-align: left;
        }

        .meta {
            margin-top: 15px;
            font-size: 11px;
            line-height: 1.6;
        }

        .deskripsi {
            margin-top: 10px;
            font-size: 12px;
            background-color: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #3498db;
        }
    </style>
</head>

<body>

    <h1>Detail Program Kerja UKM</h1>

    <table>
        <thead>
            <tr>
                <th>Nama UKM</th>
                <th>Program Kerja</th>
                <th>Bidang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $proker->ukm->nama }}</td>
                <td>{{ $proker->nama }}</td>
                <td>{{ $proker->bidang }}</td>
                <td>{{ ucfirst($proker->status) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="deskripsi">
        <strong>Deskripsi:</strong><br>
        {{ $proker->deskripsi }}
    </div>

    <div class="meta">
        <strong>Dibuat:</strong> {{ \Carbon\Carbon::parse($proker->created_at)->format('d M Y H:i') }}<br>
        <strong>Diperbarui:</strong> {{ \Carbon\Carbon::parse($proker->updated_at)->format('d M Y H:i') }}
    </div>

</body>

</html>
