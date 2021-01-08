<?php

namespace Tests\Feature;

use App\Http\Livewire\PollExample;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PollTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function main_page_has_poll_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('poll-example');
    }

    /** @test */
    function poll_sums_orders_correctly()
    {
        Order::create(['price' => 55]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSee('$55');

        Order::create(['price' => 44]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSee('$99');
    }
}
