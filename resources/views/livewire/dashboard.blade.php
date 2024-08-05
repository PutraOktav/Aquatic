<div class="container mx-auto animate-fade-in">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-lg shadow-md animate-fade-in">
            <div class="p-4 bg-blue-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-fish fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Fish Type: {{ $fishTypeCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Fish Type: {{ $fishTypeCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 100)">
            <div class="p-4 bg-green-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-seedling fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Fish Food: {{ $fishFoodCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Fish Food: {{ $fishFoodCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 200)">
            <div class="p-4 bg-yellow-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-book fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total History: {{ $riwayatCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total History: {{ $riwayatCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 300)">
            <div class="p-4 bg-red-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-file-medical fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Fish Sampling History: {{ $riwayatSamplingCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Fish Sampling History: {{ $riwayatSamplingCount }}</p>
            </div>
        </div>
        <!-- New Cards for Fish, Feed, Medicine, and Other Needs -->
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 400)">
            <div class="p-4 bg-purple-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-fish fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Fish: {{ $fishCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Fish: {{ $fishCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 500)">
            <div class="p-4 bg-indigo-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-seedling fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Feed: {{ $feedCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Feed: {{ $feedCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 600)">
            <div class="p-4 bg-pink-500 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-medkit fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Medicine: {{ $medicineCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Medicine: {{ $medicineCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md animate-fade-in" x-init="setTimeout(() => $el.classList.add('animate-fade-in'), 700)">
            <div class="p-4 bg-yellow-900 text-white rounded-t-lg flex items-center justify-center">
                <i class="fas fa-wrench fa-2x mr-2"></i>
                <span class="text-lg font-bold">Total Other Needs: {{ $otherNeedCount }}</span>
            </div>
            <div class="p-4">
                <p class="text-lg font-bold">Total Other Needs: {{ $otherNeedCount }}</p>
            </div>
        </div>
    </div>
</div>
