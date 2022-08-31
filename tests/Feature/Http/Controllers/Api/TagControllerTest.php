<?php

namespace Http\Controllers\Api;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;


class TagControllerTest extends TestCase
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


    public function test_user_can_see_all_tags()
    {
        $response = $this->get('api/tags');
        $response->assertStatus(200);
    }

    public function test_user_can_get_first_tag()
    {
        $data = DB::table('tags')
            ->first();

        $this->get("api/tags?id={$data->id}")
        ->assertStatus(200)
        ->assertSeeText($data->name);

    }

    public function test_user_can_update_tag()
    {
        $token = $this->authenticate();
        $data = DB::table('tags')->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT',"api/tags/{$data->id}",[
            'name' => 'Test product111',

        ]);

        $response->assertStatus(200);
    }

    public function test_delete_tag()
    {
        $token = $this->authenticate();
        $data = DB::table('tags')->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('DELETE',"api/tags/{$data->id}");

        $response->assertStatus(200);
    }
}
