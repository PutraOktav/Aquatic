<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white bg-opacity-80 border-b border-gray-200 rounded-lg">
                @if (!$isCalculated)
                    <div class="space-y-6">
                        <div>
                            <label for="fishType" class="block text-sm font-bold text-gray-700">🐟 Fish Type</label>
                            <select id="fishType" wire:model="fishType"
                                class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm rounded-md transition ease-in-out duration-300">
                                <option value="">Select Fish Type</option>
                                @foreach ($fishTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('fishType')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="area" class="block text-sm font-bold text-gray-700">🌊 Pond Area
                                (m<sup>2</sup>)</label>
                            <input type="number" id="area" wire:model="area"
                                class="mt-2 block w-full pl-3 pr-3 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm transition ease-in-out duration-300">
                            @error('area')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:click="calculate"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition ease-in-out duration-300">
                            🧮 Calculate
                        </button>
                    </div>
                @else
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">📊 Calculation Result</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">🐟 Fish Name</label>
                                <p class="mt-1 text-sm text-gray-800">{{ $fishTypeName }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">🌊 Pond Area</label>
                                <p class="mt-1 text-sm text-gray-800">{{ $area }} m<sup>2</sup></p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <table class="w-full divide-y divide-gray-300 bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Criteria</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Result</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($result as $key => $value)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ ucwords(str_replace('_', ' ', $key)) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucwords($value) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button wire:click="$set('isCalculated', false)"
                            class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition ease-in-out duration-300">
                            🔄 Calculate Again
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>