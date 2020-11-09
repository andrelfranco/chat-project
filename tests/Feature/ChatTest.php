<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatTest extends TestCase
{
    /**
     * @test .
     *
     * @return void
     */
    public function itShouldSendMessage()
    {
        $response = $this->post('/api/message', ['contact_id' => 1, 'message' => 'Testando API']);

        $response->assertStatus(201);

        $response->assertJson(['message' => 'Mensagem criada com sucesso!']);
    }
    /**
     * @test .
     *
     * @return void
     */
    public function itShouldNotFoundContact()
    {
        $response = $this->post('/api/message', ['contact_id' => 99999999, 'message' => 'Testando API']);

        $response->assertStatus(404);

        $response->assertJson(['message' => 'Contato não existente']);
    }
}
