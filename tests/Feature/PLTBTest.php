<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PLTBTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertPLTB()
    {
        $response = $this->post('/api/pembangkit/pltb', [
            'nama' => 'PLTB Bogor',
            'tipe_turbin' => 'Turbin 1',
            'unit_turbin' => 'Turbin 1x1000',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTB",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
        ->assertJson([
            "status" => true
        ]);

        return $response["id"];
    }

    public function testGetPLTBbyPage()
    {
        $this->testInsertPLTB();
        $response = $this->get('/api/pembangkit/pltbs');
        $response->dump();
    }

    public function testGetPLTBNearby()
    {
        $this->testInsertPLTB();
        $response = $this->get('/api/pembangkit/pltb/nearby?'.
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578'
        );

        $response->dump();
    }

    public function testUpdatePLTB()
    {
        $id = $this->testInsertPLTB();
        $this->put('/api/pembangkit/pltb/'. $id, [
            'nama' => 'PLTB Bogor',
            'tipe_turbin' => 'Turbin 1',
            'unit_turbin' => 'Turbin 1x1000',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Iyakah PLTB Bogor?",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
        ->assertJson([
            "status" => true
        ]);
    }

    public function testDeletePLTB()
    {
        $id = $this->testInsertPLTB();
        $this->delete('/api/pembangkit/pltb/' . $id)
        ->assertJson([
            "status" => true
        ]);
    }

}
