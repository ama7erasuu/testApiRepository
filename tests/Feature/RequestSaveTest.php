<?php

namespace Tests\Feature;

use Tests\TestCase;

class RequestSaveTest extends TestCase
{
    /**
     * @return void
     */
    public function test_create_request(): void
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'status' => 'Active',
            'message' => 'Test message',
        ];

        $response = $this->json('POST', 'api/requests', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('requests', [
            'id' => $response->json('id'),
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'message' => $data['message'],
        ]);
    }
}
