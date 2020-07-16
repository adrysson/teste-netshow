<?php

namespace Tests\Feature\Http;

use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->get(route('contacts.create'));

        $response->assertStatus(200);
    }

    public function testStoreWithErrors()
    {
        // Envio sem csrf token
        $response = $this->post(route('contacts.store'), []);
        $response->assertStatus(419);

        // Envio com csrf token mas sem dados necessários
        $response = $this->post(route('contacts.store'), [
            '_token' => Session::token(),
        ]);
        $response->assertStatus(302)
            ->assertRedirect(route('contacts.create'))
            ->assertSessionHasErrors(['name', 'email', 'phone', 'message', 'file']);
    }

    public function testStoreWithValidData()
    {
        // Envio sem csrf token
        $response = $this->post(route('contacts.store'), []);
        $response->assertStatus(419);

        $data = factory(Contact::class)->make();
        $response = $this->post(route('contacts.store'), array_merge($data->toArray(), [
            '_token' => Session::token(),
        ]));
        $response->assertStatus(302)
            ->assertRedirect(route('contacts.create'))
            ->assertSessionDoesntHaveErrors();
    }
}
