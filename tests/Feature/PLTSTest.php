<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PLTSTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertSuccess()
    {
        for ($i=0; $i<50; $i++) {
            $response = $this->post('/api/pembangkit/plts', [
                'nama' => 'PLTS Depok',
                'unit_panel' => 'Panel V2',
                'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
                'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
                'deskripsi' => "Adalah PLTS",
                'lokasi' => 'Depok',
                'kapasitas' => 30.5,
                'gambar' => 'testGambar.png'
            ]);
        }

//            $response->dump();
            return $response['data']["id"];
    }

    public function testUpdate(): void
    {
        $id = $this->testInsertSuccess();
        $response = $this->put('/api/pembangkit/plts/' . $id, [
            'nama' => 'PLTA Depok',
            'unit_panel' => 'Panel V2',
            'longitude' => -6.589169556757834,
            'latitude' => 106.8061123132633,
            'deskripsi' => "Adalah PLTS yang berada di Depok",
            'lokasi' => 'Depok',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ]);

        $response->dump();
    }

    public function testDelete(): void
    {
        $id = $this->testInsertSuccess();
        $response = $this->delete('/api/pembangkit/plts/' . $id);

        $response->dump();
    }

    public function  testFindNear(): void
    {
        $this->testInsertSuccess();
        $response = $this->get('/api/pembangkit/plts/nearby?' .
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578');
        echo $response->dump();
    }
}
