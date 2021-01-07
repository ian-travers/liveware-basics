<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function main_page_contains_contact_form_livewire_component()
    {
        $this->withoutExceptionHandling();
        $this->get('/')
            ->assertSeeLivewire('contact-form');
    }

    /** @test */
    function valid_form_is_submitted()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Onio')
            ->set('email', 'sup@mail.com')
            ->set('phone', '55547852')
            ->set('message', 'This is great!')
            ->call('submitForm')
            ->assertSee('We received your message successfully and will get back to you shortly!');
    }

    /** @test */
    function it_requires_a_name_an_email_a_phone_a_message()
    {
        Livewire::test(ContactForm::class)
            ->call('submitForm')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ]);
    }

    /** @test */
    function it_requires_a_name_min_3_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'On')
            ->call('submitForm')
            ->assertHasErrors([
                'name' => 'min',
            ]);
    }

    /** @test */
    function it_requires_a_message_min_5_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('message', 'wow')
            ->call('submitForm')
            ->assertHasErrors([
                'message' => 'min',
            ]);
    }

    /** @test */
    function it_requires_a_valid_email()
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'wow@mail')
            ->call('submitForm')
            ->assertHasErrors([
                'email' => 'email',
            ]);
    }
}
