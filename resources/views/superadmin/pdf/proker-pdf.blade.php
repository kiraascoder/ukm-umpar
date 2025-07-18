<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Daftar Proker UKM UMPAR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th {
            background-color: #f0f0f0;
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
            vertical-align: top;
        }

        .deskripsi-row {
            background-color: #f9f9f9;
        }

        .deskripsi-content {
            padding: 10px;
            font-size: 11.5px;
            line-height: 1.6;
        }

        .deskripsi-content strong {
            display: inline-block;
            width: 80px;
        }

        .divider {
            margin: 20px 0;
            border-top: 2px solid #ccc;
        }
    </style>
</head>

<body>

    <h1>Daftar Program Kerja UKM</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama UKM</th>
                <th>Program Kerja</th>
                <th>Bidang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proker as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->ukm->nama }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ ucfirst($item->bidang) }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
                <tr class="deskripsi-row">
                    <td colspan="5">
                        <div class="deskripsi-content">
                            <strong>Deskripsi:</strong> {{ $item->deskripsi }}<br><br>
                            <strong>Dibuat:</strong>
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}<br>
                            <strong>Diupdate:</strong>
                            {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y H:i') }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
