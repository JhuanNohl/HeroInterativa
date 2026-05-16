<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_vite_build_manifest_is_available(): void
    {
        $response = $this->get('/build/manifest.json');

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/json');
    }

    public function test_build_asset_route_rejects_path_traversal(): void
    {
        $response = $this->get('/build/../.env');

        $response->assertStatus(404);
    }
}
