<style>
    /* Card animation */
    .card {
        transition: transform 0.3s ease-in-out;
        background: linear-gradient(145deg, #ffffff, #e6e6e6);
    }

    .card:hover {
        transform: translateY(-10px);
    }

    /* Icon animation */
    .card i {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover i {
        transform: rotate(10deg) scale(1.2);
    }

    /* Flexbox alignment for the card content */
    .card-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Flexbox alignment for the icon and text */
    .icon-text {
        display: flex;
        align-items: center;
    }

    /* Font size and weight for the headings */
    .heading {
        font-size: 1.25rem;
        font-weight: bold;
    }

    /* Font size and weight for the counts */
    .count {
        font-size: 1.5rem;
        font-weight: bold;
    }
</style>

<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-fish fa-2x mr-3 text-blue-500"></i>
                    <span class="heading">Total Fish Type</span>
                </div>
                <span class="count text-blue-500">{{ $fishTypeCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-seedling fa-2x mr-3 text-green-500"></i>
                    <span class="heading">Total Fish Food</span>
                </div>
                <span class="count text-green-500">{{ $fishFoodCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-book fa-2x mr-3 text-yellow-500"></i>
                    <span class="heading">Total History</span>
                </div>
                <span class="count text-yellow-500">{{ $riwayatCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-file-medical fa-2x mr-3 text-red-500"></i>
                    <span class="heading">Total Fish Sampling History</span>
                </div>
                <span class="count text-red-500">{{ $riwayatSamplingCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-fish fa-2x mr-3 text-indigo-500"></i>
                    <span class="heading">Total Fish</span>
                </div>
                <span class="count text-indigo-500">{{ $fishCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-seedling fa-2x mr-3 text-pink-500"></i>
                    <span class="heading">Total Feed</span>
                </div>
                <span class="count text-pink-500">{{ $feedCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-medkit fa-2x mr-3 text-teal-500"></i>
                    <span class="heading">Total Medicine</span>
                </div>
                <span class="count text-teal-500">{{ $medicineCount }}</span>
            </div>
        </div>
        <div class="card rounded-lg p-6">
            <div class="card-content">
                <div class="icon-text">
                    <i class="fas fa-wrench fa-2x mr-3 text-orange-500"></i>
                    <span class="heading">Total Other Needs</span>
                </div>
                <span class="count text-orange-500">{{ $otherNeedCount }}</span>
            </div>
        </div>
    </div>
</div>
