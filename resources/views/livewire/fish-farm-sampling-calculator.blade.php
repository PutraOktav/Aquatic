<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-lg font-semibold text-gray-800 mb-4">Fish Farm Sampling Requirements</h1>
    <div class="container">
        <div class="space-y-4">
            {{-- Display the form --}}
            @if (!$result)
                <form wire:submit.prevent="calculate" class="space-y-4">
                    @csrf

                    <div>
                        <label for="fishType" class="block text-sm font-medium text-gray-700">Fish Type</label>
                        <select wire:model="fishType" id="fishType" name="fish_type"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Select Fish Type</option>
                            @foreach ($fishTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('fishType')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="ukuranIkanSampling" class="block text-sm font-medium text-gray-700">Fish Size
                            (gram)</label>
                        <input wire:model="ukuranIkanSampling" type="number" id="ukuranIkanSampling"
                            name="ukuranIkanSampling"
                            class="mt-1 block w-full pl-3 pr-3 py-2 border-2  border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('ukuranIkanSampling')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="area" class="block text-sm font-medium text-gray-700">Farm Area
                            (m<sup>2</sup>)</label>
                        <input wire:model="area" type="number" id="area" name="area"
                            class="mt-1 block w-full pl-3 pr-3 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('area')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Calculate
                    </button>
                </form>
            @endif

            {{-- Display the calculation results --}}
            @if ($result)
                <div class="mt-4 bg-gray-100 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Calculation Results</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Fish Name</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fishTypeName }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Farm Area
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $area }}
                                    m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Total Fish
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $result['total_fish'] }} Fish</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Feed Per Day
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $result['feed_per_day'] }} Kg</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Biomass (kg)
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $result['biomassa_kg'] }} Kg</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Feed Name
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $result['nama_pakan'] }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sampling Time
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $result['sampling'] }}
                                    Weeks</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Pre-Sampling
                                    Feed</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $result['feedSampling'] }} Kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
