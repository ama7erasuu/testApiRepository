<?php


use Tests\TestCase;

class RequestUpdateTest extends TestCase
{
    /**
     * @return void
     */
    public function test_update_request(): void
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'This is a test message',
        ];

        $response = $this->json('POST', 'api/requests', $data);
        $response->assertStatus(201);

        $requestData = json_decode($response->getContent(), true);

        $response = $this->json('PUT', 'api/requests', [
            'id' => $requestData['id'],
            'comment' => 'This is a test comment',
        ]);
        $response->assertStatus(200);

        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals($requestData['id'], $responseData['id']);
        $this->assertEquals($data['name'], $responseData['name']);
        $this->assertEquals($data['email'], $responseData['email']);
        $this->assertEquals('Resolved', $responseData['status']);
        $this->assertEquals('This is a test message', $responseData['message']);
        $this->assertEquals('This is a test comment', $responseData['comment']);

    }
}
