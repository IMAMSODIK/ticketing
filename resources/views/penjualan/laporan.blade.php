<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan Tiket</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #333;
            padding: 4px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        h2, p {
            margin: 0 0 10px;
        }
    </style>
</head>
<body>
    <h2>Laporan Penjualan Tiket - {{ $event->title ?? '-' }}</h2>
    @if($filter['status'] || $filter['jenis_tiket'])
        <p>
            Filter:
            @if($filter['status']) Status: <strong>{{ ucfirst($filter['status']) }}</strong> @endif
            @if($filter['jenis_tiket']) | Jenis Tiket: <strong>{{ $filter['jenis_tiket'] }}</strong> @endif
        </p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Jenis Tiket</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Metode</th>
                <th>Bank</th>
                <th>VA Number</th>
                <th>Dibayar Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $i => $order)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>{{ $order->jenisTiket->nama ?? '-' }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->payment_type ?? '-' }}</td>
                    <td>{{ $order->bank ?? '-' }}</td>
                    <td>{{ $order->va_number ?? '-' }}</td>
                    <td>{{ $order->paid_at ? \Carbon\Carbon::parse($order->paid_at)->format('d/m/Y H:i') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
