<div class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="jenis_produk" class="block font-bold mb-2">Product Type:</label>
        <input type="text" id="jenis_produk" wire:model="jenis_produk"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        @error('jenis_produk')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="biaya_produksi" class="block font-bold mb-2">Production Cost:</label>
        <input type="number" id="biaya_produksi" wire:model="biaya_produksi"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        @error('biaya_produksi')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="jumlah_produk" class="block font-bold mb-2">Product Quantity:</label>
        <input type="number" id="jumlah_produk" wire:model="jumlah_produk"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        @error('jumlah_produk')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="persentase_keuntungan" class="block font-bold mb-2">Profit Percentage (%):</label>
        <input type="number" id="persentase_keuntungan" wire:model="persentase_keuntungan"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        @error('persentase_keuntungan')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <button wire:click="hitungTotalHpp" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
            Calculate Total HPP
        </button>
    </div>


    @if ($total_hpp)
        <div>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border border-gray-500 px-4 py-2">Product Type</th>
                        <th class="border border-gray-500 px-4 py-2">Production Cost</th>
                        <th class="border border-gray-500 px-4 py-2">Product Quantity</th>
                        <th class="border border-gray-500 px-4 py-2">Profit Percentage (%)</th>
                        <th class="border border-gray-500 px-4 py-2">Total HPP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-500 px-4 py-2">{{ $jenis_produk }}</td>
                        <td class="border border-gray-500 px-4 py-2">Rp
                            {{ number_format($biaya_produksi, 0, ',', '.') }},00</td>
                        <td class="border border-gray-500 px-4 py-2">{{ $jumlah_produk }}</td>
                        <td class="border border-gray-500 px-4 py-2">{{ $persentase_keuntungan }}%</td>
                        <td class="border border-gray-500 px-4 py-2">Rp {{ number_format($total_hpp, 0, ',', '.') }},00
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
