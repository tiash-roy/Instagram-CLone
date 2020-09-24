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

    public function testRoutes()
    {
        $appURL = env('APP_URL');

        $urls = [
            'http://127.0.0.1:8000/subir-imagen',
        ];

        echo  PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== 200){
                echo  $appURL . $url . ' (FAILED) did not return a 200.';
                $this->assertTrue(false);
            } else {
                echo $appURL . $url . ' (success ?)';
                $this->assertTrue(true);
            }
            echo  PHP_EOL;
        }

    }

    public function testRoutes1()
    {
        $appURL = env('APP_URL');

        $urls = [
            'http://127.0.0.1:8000/likes',
        ];

        echo  PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== 200){
                echo  $appURL . $url . ' (FAILED) did not return a 200.';
                $this->assertTrue(true);
            } else {
                echo $appURL . $url . ' (success ?)';
                $this->assertTrue(false);
            }
            echo  PHP_EOL;
        }

    }

    public function testButton() {
         $this->visit('/http://127.0.0.1:8000/')
         ->click('Users')
         ->seePageIs('/usuarios');
    }
}


   














