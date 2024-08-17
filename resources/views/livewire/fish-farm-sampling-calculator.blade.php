<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white bg-opacity-80 border-b border-gray-200 rounded-lg">
            {{-- Display the form --}}
            @if (!$result)
                <form wire:submit.prevent="calculate" class="space-y-6">
                    @csrf

                    <div>
                        <label for="fishType" class="block text-sm font-bold text-gray-700">🐟 Fish Type</label>
                        <select wire:model="fishType" id="fishType" name="fish_type"
                            class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-2 border-gray-300 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm rounded-md transition ease-in-out duration-300">
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
                        <label for="ukuranIkanSampling" class="block text-sm font-bold text-gray-700">🐟 Fish Size
                            (gram)</label>
                        <input wire:model="ukuranIkanSampling" type="number" id="ukuranIkanSampling"
                            name="ukuranIkanSampling"
                            class="mt-2 block w-full pl-3 pr-3 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm transition ease-in-out duration-300">
                        @error('ukuranIkanSampling')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="area" class="block text-sm font-bold text-gray-700">🌾 Farm Area
                            (m<sup>2</sup>)</label>
                        <input wire:model="area" type="number" id="area" name="area"
                            class="mt-2 block w-full pl-3 pr-3 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm transition ease-in-out duration-300">
                        @error('area')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition ease-in-out duration-300">
                        🧮 Calculate
                    </button>
                </form>
            @endif

            {{-- Display the calculation results --}}
            @if ($result)
                <div class="mt-6 bg-gray-100 rounded-lg p-6 shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">📊 Calculation Results</h3>
                    <table class="min-w-full divide-y divide-gray-300 bg-white shadow-md rounded-lg">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">🐟 Fish Name</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fishTypeName }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">🌾 Farm Area</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $area }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">🪙 Total Fish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['total_fish'] }} Fish</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">🍽️ Feed Per Day</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['feed_per_day'] }} Kg</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">⚖️ Biomass (kg)</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['biomassa_kg'] }} Kg</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">🍲 Feed Name</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['nama_pakan'] }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">⏳ Sampling Time</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['sampling'] }} Weeks</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">🎣 Pre-Sampling Feed</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['feedSampling'] }} Kg</td>
                            </tr>
                        </tbody>
                    </table>
                    <button wire:click="$set('result', null)"
                        class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition ease-in-out duration-300">
                        🔄 Calculate Again
                    </button>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
