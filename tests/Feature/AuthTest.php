<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class AuthTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $response = $this->json('POST', '/api/register', [
            'name'  =>  $name = 'Alex',
            'email'  =>  $email = time().'test@example.com',
            'password'  =>  $password = '123456789',
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
        // Receive our token
        $this->assertArrayHasKey('token',$response->json());
    }


}
