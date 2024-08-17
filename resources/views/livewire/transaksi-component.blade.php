<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="space-y-4">
                    <div>
                        <label for="jenis_ikan" class="block text-sm font-medium text-gray-700">Fish Type</label>
                        <select id="jenis_ikan" wire:model="jenis_ikan"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Choose Fish Type</option>
                            <option value="Bawal">Bawal</option>
                            <option value="Cupang">Cupang</option>
                            <option value="Gurame">Gurame</option>
                            <option value="Koi">Koi</option>
                            <option value="Koki">Koki</option>
                            <option value="Lele">Lele</option>
                            <option value="Mujahir">Mujahir</option>
                            <option value="Nila">Nila</option>
                        </select>
                        @error('jenis_ikan')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Total</label>
                        <input type="number" id="jumlah" wire:model="jumlah"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @error('jumlah')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="harga_per_unit" class="block text-sm font-medium text-gray-700">Price per Unit</label>
                        <input type="text" id="harga_per_unit" wire:model="harga_per_unit"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @error('harga_per_unit')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700">Transaction
                            Date</label>
                        <input type="date" id="tanggal_transaksi" wire:model="tanggal_transaksi"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @error('tanggal_transaksi')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button wire:click="simpanTransaksi"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Transactions
                    </button>
                </div>
                @if (session()->has('message'))
                    <div class="mt-4 text-green-600">
                        {{ session('message') }}
                    </div>
                @endif
                <h2 class="mt-8 text-lg font-medium text-gray-900">List of Transactions</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Fish Type</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Price per Unit</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Total Price</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500
                                    uppercase tracking-wider">
                                    Transaction Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500
                                    uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <!-- Checkbox for selecting transaction -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $transaksi->jenis_ikan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaksi->jumlah }}
                                        Fish
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp.
                                        {{ number_format($transaksi->harga_per_unit, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp.
                                        {{ number_format($transaksi->jumlah * $transaksi->harga_per_unit, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $transaksi->tanggal_transaksi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button wire:click="deleteTransaksi({{ $transaksi->id }})"
                                            class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('transaksi.pdf', ['trans

