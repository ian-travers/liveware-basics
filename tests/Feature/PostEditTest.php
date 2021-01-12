<?php

namespace Tests\Feature;

use App\Http\Livewire\PostEdit;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PostEditTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function post_edit_page_contains_post_edit_livewire_component()
    {
        $post = Post::create([
            'title' => 'New post',
            'content' => 'Content'
        ]);

        $this->get(route('post.edit', $post))
            ->assertSeeLivewire('post-edit');
    }

    /** @test */
    function post_edit_page_form_works()
    {
        $post = Post::create([
            'title' => 'New post',
            'content' => 'Content'
        ]);

        Livewire::test(PostEdit::class, ['post' => $post])
            ->set('title', 'New Title')
            ->set('content', 'Changed')
            ->call('submitForm')
            ->assertSee('Post was updated successfully!');

        $post->refresh();

        $this->assertEquals('New Title', $post->title);
        $this->assertEquals('Changed', $post->content);
    }

    /** @test */
    function post_edit_page_upload_works_for_images()
    {
        $post = Post::create([
            'title' => 'New post',
            'content' => 'Content'
        ]);

        Storage::fake('public');

        $file = UploadedFile::fake()->image('photo');

        Livewire::test(PostEdit::class, ['post' => $post])
            ->set('photo', $file)
            ->call('submitForm')
            ->assertSee('Post was updated successfully!');

        $post->refresh();

        $this->assertNotNull($post->photo);

        Storage::disk('public')->assertExists($post->photo);
    }

    /** @test */
    function post_edit_page_upload_doesnt_work_for_non_images()
    {
        $post = Post::create([
            'title' => 'New post',
            'content' => 'Content'
        ]);

        Storage::fake('public');

        $file = UploadedFile::fake()->create('doc.pdf', 22);

        Livewire::test(PostEdit::class, ['post' => $post])
            ->set('photo', $file)
            ->call('submitForm')
            ->assertHasErrors(['photo' => 'image'])
            ->assertSee('The photo must be an image');

        $post->refresh();

        $this->assertNull($post->photo);
    }
}
