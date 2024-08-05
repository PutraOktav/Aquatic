<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class TransaksiComponent extends Component
{
    public $transaksis;
    public $jenis_ikan;
    public $jumlah;
    public $harga_per_unit;
    public $tanggal_transaksi;
    public $selectedTransaksis = [];

    public function mount()
    {
        // Load initial data
        $this->transaksis = Transaksi::all();
    }

    public function simpanTransaksi()
    {
        // Validation rules
        $this->validate([
            'jenis_ikan' => 'required',
            'jumlah' => 'required|numeric',
            'harga_per_unit' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
        ]);

        // Save new Transaksi
        Transaksi::create([
            'jenis_ikan' => $this->jenis_ikan,
            'jumlah' => $this->jumlah,
            'harga_per_unit' => $this->harga_per_unit,
            'tanggal_transaksi' => $this->tanggal_transaksi,
        ]);

        // Refresh data after saving
        $this->transaksis = Transaksi::all();

        // Show success message
        session()->flash('message', 'Transaksi saved successfully.');
    }
    public function deleteTransaksi()
    {
        // Loop through selectedTransaksis to delete Transaksis
        foreach ($this->selectedTransaksis as $id => $selected) {
            if ($selected) {
                $transaksi = Transaksi::find($id);
                if ($transaksi) {
                    $transaksi->delete();
                } else {
                    // Optionally handle the case where the record is not found
                    session()->flash('error', "Transaksi with ID $id not found.");
                }
            }
        }
    
        // Refresh data after deleting
        $this->transaksis = Transaksi::all();
    }
    

    public function render()
    {
        return view('livewire.transaksi-component');
    }
}
