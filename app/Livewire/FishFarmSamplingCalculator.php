<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FishFood;
use App\Models\FishType;
use App\Models\RiwayatSampling;

class FishFarmSamplingCalculator extends Component
{
    public $fishType;
    public $area;
    public $ukuranIkanSampling;
    public $result;
    public $isCalculated = false;
    public $fishTypeName = null;

    protected $rules = [
        'fishType' => 'required|exists:fish_types,id',
        'area' => 'required|numeric|min:1',
        'ukuranIkanSampling' => 'required|numeric|min:1',
    ];

    public function calculate()
    {
        $this->validate();

        $fishType = FishType::find($this->fishType);
        $ukuranIkanSampling = $this->ukuranIkanSampling;
        $totalFish = $this->area * $fishType->stocking_density;
        $ukuranAwal = $fishType->ukuran_awal;
        $biomassa = $ukuranAwal * $totalFish;
        $feedDay = $biomassa * 0.03 / 1000;
        $biomassakg = $biomassa / 1000;
        $feed = FishFood::find($fishType->fish_food_id);
        $namaPakan = $feed->name;
        $sampling = $fishType->waktu_sampling;
        $feedSampling = $sampling * $feedDay * 7;
        
        $this->result = [
            'fish_type_id' => $this->fishType,
            'area' => $this->area,
            'total_fish' => $totalFish,
            'feed_per_day' => $feedDay,
            'biomassa_kg' => $biomassakg,
            'ukuranIkanSampling' => $ukuranIkanSampling,
            'nama_pakan' => $namaPakan,
            'sampling' => $sampling,
            'feedSampling' =>  $feedSampling,
        ];
        $selectedFishType = FishType::find($this->fishType);
        $this->fishTypeName = $selectedFishType->name;
        $this->isCalculated = true;

            //  Simpan hasil perhitungan ke database
            RiwayatSampling::create([
                'name' => $this->fishTypeName = $selectedFishType->name,
                'area' => $this->area,
                'ukuranIkanSampling' => $ukuranIkanSampling,
                'feedDayKG' => $feedDay,
                'totalFeedSampling' => $feedSampling,
                'sampling' => $sampling,
            ]);
    }

    public function render()
    {
        return view('livewire.fish-farm-sampling-calculator', [
            'fishTypes' => FishType::all(),
        ]);
    }
}
