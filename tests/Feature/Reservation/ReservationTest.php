<?php

namespace Tests\Feature\Reservation;

use App\Models\Reservation;
use Tests\TestCase;

class ReservationTest extends TestCase
{
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
}
