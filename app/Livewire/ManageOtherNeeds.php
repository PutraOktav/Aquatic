<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OtherNeed;

class ManageOtherNeeds extends Component
{
    public $otherNeeds;
    public $name;
    public $stock;

    public function mount()
    {
        $this->otherNeeds = OtherNeed::all();
    }

    public function render()
    {
        return view('livewire.manage-other-needs');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
        ]);

        OtherNeed::create($validatedData);

        $this->reset(['name', 'stock']);
        $this->mount();
    }

    public function delete($id)
    {
        OtherNeed::findOrFail($id)->delete();
        $this->mount();
    }
}
