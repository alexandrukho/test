<?php

namespace Http\Controllers\Api;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;


class PostControllerTest extends TestCase
{
    use WithoutMiddleware;


    protected function authenticate()
    {
        $user = User::create([
            'name' => 'test',
            'email' => rand(12345,678910).'test@gmail.com',
            'password' => \Hash::make('secret9874'),
        ]);

        if (!auth()->attempt(['email'=>$user->email, 'password'=>'secret1234'])) {
            return response(['message' => 'Login credentials are invaild']);
        }

        return auth()->user()->createToken('Laravel9PassportAuth')->accessToken;
    }


    public function test_user_can_see_all_posts()
    {
        $response = $this->get('api/posts');
        $response->assertStatus(200);
    }

    public function test_user_can_get_first_post()
    {
        $data = DB::table('posts')
            ->first();

        $this->get("api/posts?id={$data->id}")
        ->assertStatus(200)
        ->assertSeeText($data->id);

    }

    public function test_user_can_update_post()
    {
        $token = $this->authenticate();
        $data = DB::table('posts')->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT',"api/tags/{$data->id}",[
            'name' => 'Test product111',

        ]);

        $response->assertStatus(200);
    }

    public function test_delete_product()
    {
        $token = $this->authenticate();
        $data = DB::table('posts')->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('DELETE',"api/tags/{$data->id}");

        $response->assertStatus(200);
    }
}
