<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $tags;

    public function mount()
    {
        $this->tags = json_encode(Tag::all()->pluck('name'));
    }
    public function render()
    {
        return view('livewire.tags');
    }
}
