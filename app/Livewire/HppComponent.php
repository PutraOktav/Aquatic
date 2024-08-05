<?php

namespace App\Livewire;

use App\Models\Hpp;
use Livewire\Component;
use App\Models\Transaksi;

class HppComponent extends Component
{
    public $hpp;
    public $jenis_produk;
    public $biaya_produksi;
    public $jumlah_produk;
    public $persentase_keuntungan;
    public $total_hpp;

    public function mount()
    {
        // Load initial data
        $this->hpp = Hpp::all();
    }

    public function simpanHpp()
    {
        // Validation rules
        $this->validate([
            'jenis_produk' => 'required',
            'biaya_produksi' => 'required|numeric',
            'jumlah_produk' => 'required|numeric',
        ]);

        // Save new HPP
        Hpp::create([
            'jenis_produk' => $this->jenis_produk,
            'biaya_produksi' => $this->biaya_produksi,
            'jumlah_produk' => $this->jumlah_produk,
        ]);

        // Refresh data after saving
        $this->hpp = Hpp::all();

        // Show success message
        session()->flash('message', 'HPP saved successfully.');
    }

    public function deleteHpp($id)
    {
        // Find and delete HPP
        $hpp = Hpp::find($id);
        if ($hpp) {
            $hpp->delete();
        }

        // Refresh data after deleting
        $this->hpp = Hpp::all();
    }



    public function render()
    {
        return view('livewire.hpp-component');
    }

    public function hitungTotalHpp()
    {
        // Validasi inputan
        $this->validate([
            'jenis_produk' => 'required',
            'biaya_produksi' => 'required|numeric',
            'jumlah_produk' => 'required|integer',
            'persentase_keuntungan' => 'required|numeric|min:0|max:100',
        ]);

        // Hitung total HPP dengan persentase keuntungan
        $totalHpp = $this->biaya_produksi + ($this->biaya_produksi * ($this->persentase_keuntungan / 100));
        $this->total_hpp = $totalHpp;
    }
}
