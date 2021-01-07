<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentsSection;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CommentsSectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function post_page_contains_comments_livewire_component()
    {
        $post = Post::create([
            'title' => 'My first post',
            'content' => 'Content here',
        ]);

        $this->get(route('post.show', $post))
            ->assertSeeLivewire('comments-section');
    }

    /** @test */
     function valid_comment_can_be_posted()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', 'This is my comment')
            ->call('postComment')
            ->assertSee('Comment was posted')
            ->assertSee('This is my comment');
    }

    /** @test */
    function comment_is_required()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->call('postComment')
            ->assertHasErrors(['comment' => 'required'])
            ->assertSee('The comment field is required');
    }

    /** @test */
    function comment_requires_min_characters()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', 'abc')
            ->call('postComment')
            ->assertHasErrors(['comment' => 'min'])
            ->assertSee('The comment must be at least 4 characters');
    }
}
