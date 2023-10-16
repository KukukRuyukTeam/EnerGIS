<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PLTPTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertPLTP()
    {
        $response = $this->post('/api/pembangkit/pltp', [
            'nama' => 'PLTP Bogor',
            'tipe_pembangkit' => 'Generator',
            'unit_pembangkit' => 'Generator 1',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTP",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ]);

//        $response->dump();
        return $response["id"];
    }

    public function testGetPLTPbyID()
    {
        $id = $this->testInsertPLTP();
        $response = $this->get('/api/pembangkit/pltp/' . $id);
        $response->dump();
    }

    public function testUpdatePLTP()
    {
        $id = $this->testInsertPLTP();
        $this->put('/api/pembangkit/pltp/' . $id, [
            'nama' => 'PLTP Bogor',
            'tipe_pembangkit' => 'Generator',
            'unit_pembangkit' => 'Generator 1',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Emang iya PLTP?",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
        ->assertJson([
            "status" => true
        ]);
    }

    public function testDeletePLTP()
    {
        $id = $this->testInsertPLTP();
        $response = $this->delete('/api/pembangkit/pltp/' . $id)
            ->assertJson(
                ["status" => true]
            );
    }

    public function testGetPLTPNearby()
    {
        $this->testInsertPLTP();
        $response = $this->get('/api/pembangkit/pltp/nearby?'.
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578'
        );

        $response->dump();
    }

}
