<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg overflow-hidden">
    <div class="relative">
        <img src="{{ asset('images/fish.gif') }}" class="absolute top-0 left-0 w-full h-full object-cover" />
        <div class="relative bg-gray-200 p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-gray-900">Transactions</h2>
            <form wire:submit.prevent="simpanTransaksi" class="space-y-6 mt-6">
                <div>
                    <label for="jenis_ikan" class="block text-sm font-medium text-gray-700">Fish Type:</label>
                    <select id="jenis_ikan" wire:model="jenis_ikan"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Total:</label>
                    <input type="number" id="jumlah" wire:model="jumlah"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('jumlah')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="harga_per_unit" class="block text-sm font-medium text-gray-700">Price per Unit:</label>
                    <input type="text" id="harga_per_unit" wire:model="harga_per_unit"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('harga_per_unit')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700">Transaction
                        Date:</label>
                    <input type="date" id="tanggal_transaksi" wire:model="tanggal_transaksi"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('tanggal_transaksi')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Transactions</button>
            </form>

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
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fish Type</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price per Unit</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Price</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500
                                uppercase tracking-wider">
                                Transaction Date</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500
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
                <a href="{{ route('transaksi.pdf', ['transactions' => $selectedTransaksis]) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mt-4">Print Transaction PDF</a>
            </div>
        </div>
    </div>
</div>
