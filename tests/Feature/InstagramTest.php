<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstagramTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_if_user_can_login()
    {

        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
    public function test_if_user_can_be_added()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/user/update', [
            'name' => 'Test',
            'surname' => 'Roy',
            'nick' => 'Troy',
            'email' => 'test1@test.com',

        ]);
        $this->assertCount(1, User::all());
    }

}



