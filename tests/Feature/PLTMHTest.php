<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PLTMHTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertPLTMH(): string
    {
        $response = $this->post('/api/pembangkit/pltmh', [
            'nama' => "PLTMH Bogor",
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTMH",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertJson([
                "status" => true
            ]);

        return $response["id"];
    }

    public function testUpdatePLTMH(): void
    {
        $id = $this->testInsertPLTMH();
        $this->put('/api/pembangkit/pltmh/' . $id, [
            'nama' => "PLTMH Sukabumi",
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTMH",
            'lokasi' => 'Sukabumi',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertJson([
                "status" => true
            ]);
    }

    public function testDeletePLTMH(): void
    {
        $id = $this->testInsertPLTMH();
        $this->delete('/api/pembangkit/pltmh/' . $id)
            ->assertJson([
                "status" => true
            ]);
    }

    public function testFindPLTMHNearby(): void
    {
        $this->testInsertPLTMH();
        $this->get('/api/pembangkit/pltmh/nearby?'.
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578')
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereType('data', 'array|min:1')
            );
    }
}
