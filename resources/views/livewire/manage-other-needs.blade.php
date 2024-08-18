<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-gray-100 border-b border-gray-300">
                <div class="space-y-6">
                    <!-- Form Section -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <form wire:submit.prevent="store">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center">
                                    <label for="name" class="mr-2 text-lg">Name:</label>
                                    <input type="text" id="name" wire:model="name" placeholder="Enter Item Name"
                                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex items-center">
                                    <label for="stock" class="mr-2 text-lg">Stock:</label>
                                    <input type="number" id="stock" wire:model="stock" placeholder="Enter Stock Quantity"
                                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('stock')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-200">Add</button>
                        </form>
                    </div>

                    <!-- Table Section -->
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h1 class="text-2xl font-semibold mb-4">Item List</h1>

                        <table class="min-w-full border-collapse">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="px-4 py-2 border">Name</th>
                                    <th class="px-4 py-2 border">Stock</th>
                                    <th class="px-4 py-2 border">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($otherNeeds as $need)
                                    <tr class="hover:bg-gray-100 transition duration-200">
                                        <td class="px-4 py-2 border">{{ $need->name }}</td>
                                        <td class="px-4 py-2 border">{{ $need->stock }} Unit</td>
                                        <td class="px-4 py-2 border">
                                            <button wire:click="delete({{ $need->id }})"
                                                class="bg-red-500 hover:bg-red-600 text-white font-bold px-2 py-1 rounded-md transition duration-200">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>