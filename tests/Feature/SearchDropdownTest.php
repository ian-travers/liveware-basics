<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    /** @test */
    public function main_page_contains_search_dropdown_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('search-dropdown');
    }

    /** @test */
    function search_dropdown_searches_correctly_if_song_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('Depeche Mode')
            ->set('search', 'Never let me down again')
            ->assertSee('Depeche Mode');
    }

    /** @test */
    public function search_dropdown_shows_message_if_no_song_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'asdasbcasdbciu')
            ->assertSee('No results found for');
    }
}
