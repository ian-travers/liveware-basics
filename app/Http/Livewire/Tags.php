<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $tags;

    protected $listeners = ['tagAdded', 'tagRemoved'];

    public function tagAdded($tag)
    {
        Tag::create(['name' => $tag]);
        $this->emit('tagAddedFromBackend', $tag);
    }

    public function tagRemoved($tag)
    {
        Tag::where('name', $tag)->first()->delete();
    }

    public function mount()
    {
        $this->tags = json_encode(Tag::all()->pluck('name'));
    }
    public function render()
    {
        return view('livewire.tags');
    }
}
