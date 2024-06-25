<?php

namespace Tests\Feature\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * A basic feature test example.
     */
    public function test_create_reservation(): void
    {
        $data = Reservation::factory()->make();

        $response = $this->json('POST', 'api/reservation', $data->toArray());

        $response->assertStatus(201);
        $this->assertDatabaseHas('reservation', [
            'name' => $data['name'],
            'note' => $data['note'],
        ]);
    }

    public function test_confirm_existing_reservation(): void
    {
        $reservation = Reservation::factory()->create();

        $response = $this->json('GET', 'api/reservation/' . $reservation->id);

        $response->assertStatus(200);
        $this->assertTrue($response->json('confirmation') == 'true');
    }

    public function test_not_confirm_non_existing_reservation(): void
    {
        $response = $this->json('GET', 'api/reservation/' . '-1');

        $response->assertStatus(200);
        $this->assertTrue($response->json('confirmation') == 'false');
    }

    public function test_get_all_reservations(): void
    {
        $reservations = Reservation::factory()->count(5)->create();

        $response = $this->json('GET', 'api/reservation/all');

        $response->assertStatus(200);
        $this->assertGreaterThanOrEqual(5, count($response->json()));

        $id = $reservations->all()[fake()->numberBetween(0, count($reservations->all()) - 1)]['id'];
        $this->assertNotNull(Arr::first($reservations->all(), fn($r) => $r->id === $id));
    }
}
