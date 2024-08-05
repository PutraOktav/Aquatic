<?php

namespace App\Livewire;

use App\Models\Feed;
use Livewire\Component;

class ManageFeeds extends Component
{
    public $feeds;
    public $name;
    public $stock;

    public function mount()
    {
        $this->feeds = Feed::all();
    }

    public function render()
    {
        return view('livewire.manage-feeds');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
        ]);

        Feed::create($validatedData);

        $this->reset(['name', 'stock']);
        $this->mount();
    }

    public function delete($id)
    {
        Feed::findOrFail($id)->delete();
        $this->mount();
    }
}
