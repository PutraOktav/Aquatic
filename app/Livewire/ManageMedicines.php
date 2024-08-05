<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Medicine;

class ManageMedicines extends Component
{
    public $medicines;
    public $name;
    public $stock;

    public function mount()
    {
        $this->medicines = Medicine::all();
    }

    public function render()
    {
        return view('livewire.manage-medicines');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
        ]);

        Medicine::create($validatedData);

        $this->reset(['name', 'stock']);
        $this->mount();
    }

    public function delete($id)
    {
        Medicine::findOrFail($id)->delete();
        $this->mount();
    }
}
