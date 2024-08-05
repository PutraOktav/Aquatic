<?php

namespace App\Livewire;

use App\Models\Fish;
use Livewire\Component;

class ManageFish extends Component
{
    public $fishes;
    public $name;
    public $stock;

    public function mount()
    {
        $this->fishes = Fish::all();
    }

    public function render()
    {
        return view('livewire.manage-fish');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
        ]);

        Fish::create($validatedData);

        $this->reset(['name', 'stock']);
        $this->mount();
    }

    public function delete($id)
    {
        Fish::findOrFail($id)->delete();
        $this->mount();
    }
}
