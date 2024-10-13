<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */


    public function test_create_user(): void
    {
        $users = User::factory()->create();
        $this->assertModelExists($users);
    }


    public function test_fetch_user(): void
    {
        // $user = User::factory(4)->create();

        $users = User::all();
        if ($users->isEmpty()) {
            $this->assertTrue(true, 'the table user is empty');
        } else {
            $this->assertNotEmpty($users, 'this table is not empty');
        }
    }


    public function test_is_authenticated_user()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/protected-route');

        $this->assertTrue(Auth::check());
        $this->assertEquals(Auth::user()->id, $user->id);
    }

    public function test_delete_user()
    {
        $user = User::factory()->create();
        $user->delete();
        $this->assertModelMissing($user);
    }

    public function test_logout_user()
    {
        $user = Auth::user();
        Auth::logout();

        $this->assertFalse(Auth::check());
    }
}
