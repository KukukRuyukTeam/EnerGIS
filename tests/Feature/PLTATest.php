<?php

namespace Tests\Feature;

use Database\Seeders\AdminSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PLTATest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertSuccess()
    {
        $this->seed([AdminSeeder::class]);
        $response = $this->post('/api/pembangkit/plta', [
            'nama' => 'PLTA Bogor',
            'tipe_pembangkit' => 'Generator',
            'unit_pembangkit' => 'Generator 1',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTA",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ], headers: ['Authorization' => 'test'])
            ->assertJson([
                "status" => true
            ]);

        return $response['id'];
    }

    public function testInsertFailed(): void
    {
        $this->post('/api/pembangkit', [
            'nama' => 'PLTA Bogor',
            'tipe_pembangkit' => 'Generator',
            'unit_pembangkit' => 'Generator 1',
            'deskripsi' => "Adalah PLTA",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    'longitude' => [

                    ],
                    'latitude' => [

                    ],
                ]
            ]);
    }

    public function testUpdate(): void
    {

        $id = $this->testInsertSuccess();
        $response = $this->put('/api/pembangkit/plta/' . $id, [
            'nama' => 'PLTA Bogo',
            'tipe_pembangkit' => 'Generator99',
            'unit_pembangkit' => 'Generator 1',
            'longitude' => -6.589169556757834,
            'latitude' => 106.8061123132633,
            'deskripsi' => "Adalah PLTA",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
        ->assertJson([
            "status" => true
        ]);

    }

    public function testDelete(): void
    {
        $id = $this->testInsertSuccess();
        $this->delete('/api/pembangkit/plta/' . $id)
        ->assertJson([
            "status" => true
        ]);

    }

    public function  testFindNear(): void
    {
        $this->testInsertSuccess();
        $this->get('/api/pembangkit/plta/nearby?' .
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578'
        )->assertJson(fn (AssertableJson $json) =>
            $json->whereType('data', 'array|min:1')
        );
    }
}
