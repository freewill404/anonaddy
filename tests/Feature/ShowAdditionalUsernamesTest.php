<?php

namespace Tests\Feature;

use App\AdditionalUsername;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class AdditionalUsernamesTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function user_can_view_usernames_from_the_usernames_page()
    {
        $usernames = factory(AdditionalUsername::class, 3)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->get('/usernames');

        $response->assertSuccessful();
        $this->assertCount(3, $response->data('usernames'));
        $usernames->assertEquals($response->data('usernames'));
    }

    /** @test */
    public function latest_usernames_are_listed_first()
    {
        $a = factory(AdditionalUsername::class)->create([
            'user_id' => $this->user->id,
            'created_at' => Carbon::now()->subDays(15)
        ]);
        $b = factory(AdditionalUsername::class)->create([
            'user_id' => $this->user->id,
            'created_at' => Carbon::now()->subDays(5)
        ]);
        $c = factory(AdditionalUsername::class)->create([
            'user_id' => $this->user->id,
            'created_at' => Carbon::now()->subDays(10)
        ]);

        $response = $this->get('/usernames');

        $response->assertSuccessful();
        $this->assertCount(3, $response->data('usernames'));
        $this->assertTrue($response->data('usernames')[0]->is($b));
        $this->assertTrue($response->data('usernames')[1]->is($c));
        $this->assertTrue($response->data('usernames')[2]->is($a));
    }
}
