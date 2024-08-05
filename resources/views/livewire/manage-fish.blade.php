<div class="space-y-4">

    <!-- Card for Adding New Fish -->
    <div class="bg-white shadow-md rounded-lg p-4">
        <h1 class="text-2xl font-semibold mb-4">Add New Fish</h1>

        <form wire:submit.prevent="store">
            <div class="flex items-center mb-4">
                <label for="name" class="mr-2">Name:</label>
                <input type="text" id="name" wire:model="name" placeholder="Enter Name"
                    class="border rounded-md px-3 py-1 w-60">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center mb-4">
                <label for="stock" class="mr-2">Stock:</label>
                <input type="number" id="stock" wire:model="stock" placeholder="Enter Stock"
                    class="border rounded-md px-3 py-1 w-32">
                @error('stock')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Add
                Fish</button>
        </form>
    </div>

    <!-- Card for Listing Fish -->
    <div class="bg-white shadow-md rounded-lg p-4">
        <h1 class="text-2xl font-semibold mb-4">Fish Stock List</h1>

        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Stock</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fishes as $fish)
                    <tr>
                        <td class="px-4 py-2 border">{{ $fish->name }}</td>
                        <td class="px-4 py-2 border">{{ $fish->stock }} Fish</td>
                        <td class="px-4 py-2 border">
                            <button wire:click="delete({{ $fish->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
