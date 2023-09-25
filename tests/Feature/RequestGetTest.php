<?php


use Tests\TestCase;

class RequestGetTest extends TestCase
{
    /**
     * @return void
     */
    public function test_get_request(): void
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test message',
        ];

        $this->json('POST', 'api/requests', $data);

        $response = $this->json('GET', 'api/requests?page=1&per_page=1');
        $response->assertStatus(200);

        $this->assertDatabaseCount('requests',
            $response->json('total'),
        );

    }

    /**
     * @return void
     */
    public function test_get_active_request(): void
    {
        $response = $this->json('GET', 'api/requests?status=Active&page=1&per_page=1');
        $response->assertStatus(200);

        $responseData = json_decode($response->getContent(), true)['data'];
        $this->assertEquals('Active', $responseData[0]['status']);
    }

    /**
     * @return void
     */
    public function test_get_resolved_request(): void
    {
        $response = $this->json('GET', 'api/requests?status=Resolved&page=1&per_page=1');
        $response->assertStatus(200);

        $responseData = json_decode($response->getContent(), true)['data'];
        if (!empty($responseData[0]['status'])) {
            $this->assertEquals('Resolved', $responseData[0]['status']);
        } else {
            $this->assertCount(0, $response->json('total'));
        }
    }
}
