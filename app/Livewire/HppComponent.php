<?php

namespace App\Livewire;

use App\Models\Hpp;
use Livewire\Component;
use App\Models\Transaksi;

class HppComponent extends Component
{
    public $jenis_produk;
    public $biaya_produksi;
    public $jumlah_produk;
    public $persentase_keuntungan;
    public $total_hpp;

    public function mount()
    {
        // Load initial data if needed
    }

    public function hitungTotalHpp()
    {
        // Validate user input
        $this->validate([
            'jenis_produk' => 'required|string',
            'biaya_produksi' => 'required|numeric|min:0',
            'jumlah_produk' => 'required|integer|min:1',
            'persentase_keuntungan' => 'required|numeric|min:0|max:100',
        ]);

        // Calculate total HPP
        $totalCost = $this->biaya_produksi * $this->jumlah_produk;
        $profitAmount = $totalCost * ($this->persentase_keuntungan / 100);
        $this->total_hpp = $totalCost + $profitAmount; // Final HPP calculation
    }

    public function resetCalculation()
    {
        // Reset all input fields and result
        $this->reset(['jenis_produk', 'biaya_produksi', 'jumlah_produk', 'persentase_keuntungan', 'total_hpp']);
    }

    public function render()
    {
        return view('livewire.hpp-component');
    }
    
}
