<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Dompdf\Dompdf;
use Dompdf\Options;

class TransaksiComponent extends Component
{
    public $transaksis;               // Collection of transactions
    public $jenis_ikan;               // Selected fish type
    public $jumlah;                   // Quantity of fish
    public $harga_per_unit;           // Price per unit
    public $tanggal_transaksi;        // Transaction date

    public function mount()
    {
        // Load initial data from the database
        $this->transaksis = Transaksi::all();
    }

    public function simpanTransaksi()
    {
        // Validation rules
        $this->validate([
            'jenis_ikan' => 'required|string',
            'jumlah' => 'required|numeric|min:1',    // Ensure at least one fish
            'harga_per_unit' => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
        ]);

        // Save new Transaksi
        Transaksi::create([
            'jenis_ikan' => $this->jenis_ikan,
            'jumlah' => $this->jumlah,
            'harga_per_unit' => $this->harga_per_unit,
            'tanggal_transaksi' => $this->tanggal_transaksi,
        ]);

        // Refresh the transaction list
        $this->transaksis = Transaksi::all();

        // Show success message
        session()->flash('message', 'Transaction saved successfully.');

        // Reset input fields
        $this->resetInputFields();
    }

    public function deleteTransaksi($id)
    {
        // Find and delete the specified transaction
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            $transaksi->delete();
            session()->flash('message', 'Transaction deleted successfully.');
        } else {
            session()->flash('error', 'Transaction not found.');
        }
        
        // Refresh the transaction list
        $this->transaksis = Transaksi::all();
    }

    public function exportPDF()
    {
        $transaksis = Transaksi::all();
    
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
    
        $html = view('pdf.transaksi', compact('transaksis'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
    
        // Menggunakan format nama file yang lebih sesuai
        $date = date('Y-m-d'); // Format tanggal sesuai yang diinginkan
        $filename = 'transaction_' . $date . '.pdf';  // Ubah nama file menjadi sesuai keinginan
        $dompdf->stream($filename, ['Attachment' => false]);
        
    }

    private function resetInputFields()
    {
        // Reset input fields after saving
        $this->jenis_ikan = '';
        $this->jumlah = '';
        $this->harga_per_unit = '';
        $this->tanggal_transaksi = '';
    }

    public function render()
    {
        return view('livewire.transaksi-component');
    }
}

