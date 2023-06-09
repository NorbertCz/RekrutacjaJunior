<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class testHTTP extends TestCase
{
    
    public function testEndpoint(): void
    {
         $response = $this->get('/endpoint');

        $response->assertStatus(200);
    }
    public function testAdminCanAccessEndpoint()
    {
    $user = factory(User::class)->create(['role' => 'admin']);
    $response = $this->actingAs($user)->get('/api/customers');
    $response->assertStatus(200);
    }
}
