<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\FishFood;
use App\Models\FishType;
use App\Models\RiwayatSampling;

class HomeController extends Controller
{
public function index()
{
    $fishTypeCount = FishType::count();
    $fishFoodCount = FishFood::count();
    $riwayats = Riwayat::latest()->take(5)->get();
    $riwayatSamplings = RiwayatSampling::latest()->take(5)->get();
    $riwayatCount = Riwayat::count();
    $riwayatSamplingCount = RiwayatSampling::count();

    return view('dashboard', compact('fishTypeCount', 'fishFoodCount', 'riwayats', 'riwayatSamplings', 'riwayatCount', 'riwayatSamplingCount'));
}

}


