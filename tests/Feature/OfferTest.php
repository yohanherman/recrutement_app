<?php

namespace Tests\Feature;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class OfferTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_fetch_offers()
    {
        $offers = Offer::all();
        if ($offers->isEmpty()) {
            $this->assertEmpty($offers);
        } else {
            $this->assertNotEmpty($offers);
        }
    }

    public function test_create_offers()
    {
        $user = User::create([
            'name' => 'yann',
            'email' => 'yann@gmail.com',
            'password' => Hash::make(1234),
            'phone_number' => '0765484584',
            'gender' => 'male',
            'birthdate' => '2021/10/10',
            'role' => 'job-seeker',
        ]);

        $offers = Offer::factory()->create(['user_id'=> $user->id]);
        $this->assertModelExists($offers);
        $this->assertDatabaseHas('offers', [
            'user_id' => 1
        ]);
    }

    public function test_delete_Offer()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $offer = Offer::factory()->create(['user_id' => $user->id]);
        $offer->delete();
        $this->assertModelMissing($offer);
    }

    public function test_update_offer()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $offer = Offer::factory()->create(['user_id' => $user->id]);

        $updatedData = [
            'Title_offer' => 'Nouveau Titre',
            'Company_name' => 'Nouvelle Entreprise',
            'Location' => 'Nouvelle Localisation',
            'Salary_range' => '40k-60k',
        ];

        $offer->update($updatedData);

        $this->assertDatabaseHas('offers', [
            'Title_offer' => 'Nouveau Titre',
            'Company_name' => 'Nouvelle Entreprise',
        ]);
    }
}
