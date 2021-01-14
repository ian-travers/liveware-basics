<?php

namespace Tests\Feature;

use App\Http\Livewire\Tags;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TagsComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function main_page_contains_tags_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('tags');
    }

    /** @test */
    public function loads_existing_tags_correctly()
    {
        Tag::create([ 'name' => 'Racing' ]);
        Tag::create([ 'name' => 'Streets' ]);

        Livewire::test(Tags::class)
            ->assertSet('tags', json_encode(['Racing', 'Streets']));
    }

    /** @test */
    public function adds_tags_correctly()
    {
        Tag::create([ 'name' => 'one' ]);
        Tag::create([ 'name' => 'two' ]);

        Livewire::test(Tags::class)
            ->emit('tagAdded', 'three')
            ->assertEmitted('tagAddedFromBackend', 'three');

        $this->assertDatabaseHas('tags', [
            'name' => 'three',
        ]);
    }

    /** @test */
    public function removes_tags_correctly()
    {
        Tag::create([ 'name' => 'one' ]);
        Tag::create([ 'name' => 'two' ]);

        Livewire::test(Tags::class)
            ->emit('tagRemoved', 'two');

        $this->assertDatabaseMissing('tags', [
            'name' => 'two',
        ]);
        $this->assertDatabaseCount('tags', 1);
    }
}
