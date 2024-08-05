<?php

namespace App\Livewire;

use App\Models\Feed;
use App\Models\Fish;
use App\Models\Riwayat;
use Livewire\Component;
use App\Models\FishFood;
use App\Models\FishType;
use App\Models\Medicine;
use App\Models\OtherNeed;
use App\Models\RiwayatSampling;

class Dashboard extends Component
{
    public $fishTypeCount;
    public $fishFoodCount;
    public $riwayatCount;
    public $riwayatSamplingCount;
    public $fishCount;
    public $feedCount;
    public $medicineCount;
    public $otherNeedCount;

    public function mount()
    {
        $this->fishTypeCount = FishType::count();
        $this->fishFoodCount = FishFood::count();
        $this->riwayatCount = Riwayat::count();
        $this->riwayatSamplingCount = RiwayatSampling::count(); 
        $this->fishCount = Fish::count();
        $this->feedCount = Feed::count();
        $this->medicineCount = Medicine::count();
        $this->otherNeedCount = OtherNeed::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
