<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriberAPITest extends TestCase
{
    use RefreshDatabase;

    public function setDummayData()
    {
        
    }

    public function test_subscriber_can_be_created()
    {
        $payload = [
            'email' => "desmond.kuet@gmail.com",
            "name" => "Tushar Ghosh Joy"
        ];

        $response = $this->postJson('/api/v1/subscriber', $payload);
        $response
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Resource created"
            ]);

        $this->assertDatabaseHas('subscribers', [
            'email' => 'desmond.kuet@gmail.com',
        ]);
    }

    public function test_subscriber_email_can_be_validated()
    {
        $payload = [
            'email' => ".kuet@gmail.com",
            'name' => "Tushar Ghosh joy"
        ];

        $response = $this->postJson('/api/v1/subscriber', $payload);

        $response
            ->assertStatus(422)
            ->assertJson([
                "message"   => "Invalid data send"
            ]);
    }

    public function test_subscriber_name_is_required()
    {
        $payload = [
            'email' => "desmond.kuet@gmail.com",
        ];

        $response = $this->postJson('/api/v1/subscriber', $payload);
        $response->assertStatus(422);
    }

    public function test_subscriber_can_be_deleted()
    {
        Subscriber::insert([
            'email' => 'desmond.kuet@gmail.com',
            'name' => "tGTG",
            "state" => Subscriber::STATUS_JUNK
        ]);
        $subscriber = Subscriber::where('email', 'desmond.kuet@gmail.com')->first();
        $response = $this->deleteJson('/api/v1/subscriber/' . $subscriber->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                "message"   => "Resource Deleted"
            ]);
    }
}
