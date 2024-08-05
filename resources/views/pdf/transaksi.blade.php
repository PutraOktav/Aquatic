    <body class="font-sans antialiased bg-gray-100">
        <div class="container mx-auto p-8">
            <h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>
            <table class="w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Jenis Ikan</th>
                        <th class="py-3 px-6 text-left">Jumlah</th>
                        <th class="py-3 px-6 text-left">Harga per Unit</th>
                        <th class="py-3 px-6 text-left">Total Harga</th>
                        <th class="py-3 px-6 text-left">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($transaksis as $transaksi)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $transaksi->jenis_ikan }}</td>
                            <td class="py-3 px-6 text-left">{{ $transaksi->jumlah }} Ekor</td>
                            <td class="py-3 px-6 text-left">Rp. {{ $transaksi->harga_per_unit }}</td>
                            <td class="py-3 px-6 text-left">Rp. {{ $transaksi->jumlah * $transaksi->harga_per_unit }}
                            </td>
                            <td class="py-3 px-6 text-left">{{ $transaksi->tanggal_transaksi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
