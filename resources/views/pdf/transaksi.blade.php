<!DOCTYPE html>
<html>
<head>
    <title>Transaction List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Transaction List</h1>
    <table>
        <thead>
            <tr>
                <th>Fish Type</th>
                <th>Quantity</th>
                <th>Price per Unit</th>
                <th>Total Price</th>
                <th>Transaction Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->jenis_ikan }}</td>
                    <td>{{ $transaksi->jumlah }} Fish</td>
                    <td>Rp {{ number_format($transaksi->harga_per_unit, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($transaksi->jumlah * $transaksi->harga_per_unit, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>