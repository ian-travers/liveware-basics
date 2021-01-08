<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;

class PollExample extends Component
{
    public $revenue;

    public function mount()
    {
        $this->revenue = 0;
    }

    public function getRevenue()
    {
        $this->revenue = DB::table('orders')->sum('price');
    }

    public function render()
    {
        return view('livewire.poll-example');
    }
}
