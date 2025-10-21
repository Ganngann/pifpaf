<?php

namespace Tests\Feature;

use App\Models\Ad;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ProfileAndRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_profile_can_be_viewed()
    {
        $user = User::factory()->create();
        $ad = Ad::factory()->create(['user_id' => $user->id]);
        $rating = Rating::factory()->create(['ratee_id' => $user->id, 'published_at' => now()]);

        $response = $this->get(route('profiles.show', $user));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($ad->title);
        $response->assertSee($rating->comment);
    }

    public function test_user_can_leave_a_rating()
    {
        $seller = User::factory()->create();
        $buyer = User::factory()->create();
        $ad = Ad::factory()->create(['user_id' => $seller->id]);
        $transaction = Transaction::factory()->create(['ad_id' => $ad->id, 'buyer_id' => $buyer->id, 'seller_id' => $seller->id]);

        $this->actingAs($buyer);

        $response = $this->post(route('ratings.store', $transaction), [
            'rating' => 5,
            'comment' => 'Great seller!',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('ratings', [
            'transaction_id' => $transaction->id,
            'rater_id' => $buyer->id,
            'ratee_id' => $seller->id,
            'rating' => 5,
            'comment' => 'Great seller!',
        ]);
    }

    public function test_ratings_are_published_when_both_users_have_rated()
    {
        $seller = User::factory()->create();
        $buyer = User::factory()->create();
        $ad = Ad::factory()->create(['user_id' => $seller->id]);
        $transaction = Transaction::factory()->create(['ad_id' => $ad->id, 'buyer_id' => $buyer->id, 'seller_id' => $seller->id]);

        $this->actingAs($buyer);
        $this->post(route('ratings.store', $transaction), ['rating' => 5]);

        $this->actingAs($seller);
        $this->post(route('ratings.store', $transaction), ['rating' => 4]);

        $this->assertNotNull(DB::table('ratings')->where('transaction_id', $transaction->id)->first()->published_at);
    }

    public function test_ratings_are_published_after_14_days()
    {
        $seller = User::factory()->create();
        $buyer = User::factory()->create();
        $ad = Ad::factory()->create(['user_id' => $seller->id]);
        $transaction = Transaction::factory()->create(['ad_id' => $ad->id, 'buyer_id' => $buyer->id, 'seller_id' => $seller->id]);

        $this->actingAs($buyer);
        $this->post(route('ratings.store', $transaction), ['rating' => 5]);

        $this->travel(15)->days();

        $this->artisan('ratings:publish');

        $this->assertNotNull(DB::table('ratings')->where('transaction_id', $transaction->id)->first()->published_at);
    }
}
