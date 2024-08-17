<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if (!isset($isCalculated))
                    <div class="space-y-4">
                        <div>
                            <label for="jenis_produk" class="block text-sm font-medium text-gray-700">Product Type</label>
                            <input type="text" id="jenis_produk" wire:model="jenis_produk"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @error('jenis_produk')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="biaya_produksi" class="block text-sm font-medium text-gray-700">Production Cost</label>
                            <input type="number" id="biaya_produksi" wire:model="biaya_produksi"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @error('biaya_produksi')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="jumlah_produk" class="block text-sm font-medium text-gray-700">Product Quantity</label>
                            <input type="number" id="jumlah_produk" wire:model="jumlah_produk"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @error('jumlah_produk')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="persentase_keuntungan" class="block text-sm font-medium text-gray-700">Profit Percentage (%)</label>
                            <input type="number" id="persentase_keuntungan" wire:model="persentase_keuntungan"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @error('persentase_keuntungan')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:click="hitungTotalHpp"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Calculate Total HPP
                        </button>
                    </div>
                @else
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Calculation Result</h3>
                        <table class="w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Product Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Production Cost</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Product Quantity</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Profit Percentage (%)</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Total HPP</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $jenis_produk }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Rp {{ number_format($biaya_produksi, 0, ',', '.') }},00
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $jumlah_produk }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $persentase_keuntungan }}%
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Rp {{ number_format($total_hpp, 0, ',', '.') }},00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button wire:click="resetCalculation"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Calculate Again
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

