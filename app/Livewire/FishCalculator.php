<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FishFood;
use App\Models\FishType;
use App\Models\Riwayat;

class FishCalculator extends Component
{
    public $fishType;
    public $area;
    public $result;
    public $isCalculated = false;
    public $fishTypeName = null;

    protected $rules = [
        'fishType' => 'required|exists:fish_types,id',
        'area' => 'required|numeric|min:1',
    ];

    public function calculate()
    {
        $this->validate();

        $fishType = FishType::find($this->fishType);
        $totalFish = $this->area * $fishType->stocking_density;
        $feedRatio = $fishType->fcr;
        $biomassaPanen = $fishType->ukuran_panen * $totalFish * $feedRatio;
        $biomassaPanenkg = $biomassaPanen / 1000;
        $totalFeed = $biomassaPanen / 1000 * $feedRatio;
        $zak = $totalFeed / 30;
        $waktuPanen = $fishType->waktu_panen;
        $ukuranAwal = $fishType->ukuran_awal;
        $biomassa = $ukuranAwal * $totalFish;
        $feedDay = $biomassa * 0.03 / 1000;
        $ukuranPanen = $fishType->ukuran_panen;
        $biomassakg = $biomassa / 1000;
        $feed = FishFood::find($fishType->fish_food_id);
        $namaPakan = $feed->name;
        $feedCost = $totalFeed * $feed->price;
        $fishCost = $totalFish * $fishType->price;
        $allCost = $feedCost + $fishCost;
        $sampling = $fishType->waktu_sampling;
        
        $this->result = [
            'fish_type_id' => $this->fishType,
            'total_fish' => $totalFish,
            'biomassa_panen_kg' => $biomassaPanenkg,
            'total_feed' => $totalFeed,
            'zak' => $zak,
            'ukuran_awal' => $ukuranAwal,
            'ukuran_panen' =>  $ukuranPanen,
            'waktu_panen' => $waktuPanen,
            'feed_per_day' => $feedDay,
            'biomassa_kg' => $biomassakg,
            'nama_pakan' => $namaPakan,
            'feed_cost' => $feedCost,
            'fish_cost' => $fishCost,
            'all_cost' => $allCost,
            'sampling' => $sampling,
        ];
        $selectedFishType = FishType::find($this->fishType);
        $this->fishTypeName = $selectedFishType->name;
        $this->isCalculated = true;

             // Simpan hasil perhitungan ke database
            Riwayat::create([
                'name' => $this->fishTypeName = $selectedFishType->name,
                'area' => $this->area,
                'totalFish' => $totalFish,
                'biomassaPanenkg' => $biomassaPanenkg,
                'totalFeed' => $totalFeed,
                'zak' => $zak,
                'ukuranAwal' => $ukuranAwal,
                'waktuPanen' => $waktuPanen,
                'ukuranPanen' =>  $ukuranPanen,
                'feedPerDay' => $feedDay,
                'biomassakg' => $biomassakg,
                'namaPakan' => $namaPakan,
                'feedCost' => $feedCost,
                'fishCost' => $fishCost,
                'allCost' => $allCost,
                'sampling' => $sampling,
            ]);
    }

    public function render()
    {
        return view('livewire.fish-calculator', [
            'fishTypes' => FishType::all(),
        ]);
    }
}
