<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PLTMTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsert()
    {
        $response = $this->post('/api/pembangkit/pltm', [
            'nama' => "PLTM Bogor",
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTM",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertJson([
                "status" => true,
            ]);

//        $response->dump();
        return $response["id"];
    }

    public function testUpdate(): void
    {
        $id = $this->testInsert();
        $this->put('/api/pembangkit/pltm/' . $id, [
            'nama' => "PLTM Sukabumi",
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTM",
            'lokasi' => 'Sukabumi',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertJson([
                "status" => true
            ]);
    }

    public function testDelete(): void
    {
        $id = $this->testInsert();
        $this->delete('/api/pembangkit/pltm/'. $id)
            ->assertJson([
                "status" => true
            ]);
    }

    public function testFindNear(): void
    {
        $this->testInsert();
        $this->get('/api/pembangkit/pltm/nearby?'.
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578')
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereType('data', 'array|min:1')
            );
    }
}
