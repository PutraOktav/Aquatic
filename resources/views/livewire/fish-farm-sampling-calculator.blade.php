<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Fish Farm Sampling Requirements</h3>
                @if (!$result)
                    <div class="space-y-4">
                        <div>
                            <label for="fishType" class="block text-sm font-medium text-gray-700">Fish Type</label>
                            <select id="fishType" wire:model="fishType"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
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
                            <label for="area" class="block text-sm font-medium text-gray-700">Farm Area
                                (m<sup>2</sup>)</label>
                            <input type="number" id="area" wire:model="area"
                                class="mt-1 block w-full pl-3 pr-3 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('area')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:click="calculate"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Calculate
                        </button>
                    </div>
                @endif

                @if ($result)
                    <div class="mt-4 bg-gray-100 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Calculation Results</h3>
                        <table class="w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
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
                                            {{ ucwords(str_replace('_', ' ', $key)) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucwords($value) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button wire:click="$set('result', null)"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Calculate Again
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

