<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PLTBmTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertSuccess()
    {
        $response = $this->post("/api/pembangkit/pltbm", [
            'nama' => 'PLTBm Bogor',
            'sumber_energi' => 'Kayu Bekas',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTBm",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ]);

//        $response->dump();
        return $response;
    }

    public function testUpdate(): void
    {
        $pltbm = $this->testInsertSuccess();
        $response = $this->put('/api/pembangkit/pltbm/'. $pltbm['id'], [
            'nama' => 'PLTBm Bogor',
            'sumber_energi' => 'Eh ternyata dari ampas kayu wkwk',
            'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
            'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
            'deskripsi' => "Adalah PLTBm",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ]);

        $response->dump();
    }

    public function testDelete(): void
    {
        $pltbm = $this->testInsertSuccess();
        $response = $this->delete('/api/pembangkit/pltbm/'. $pltbm['id']);

        $response->dump();
    }

    public function testFindNear(): void
    {
        $this->testInsertSuccess();
        $response = $this->get('/api/pembangkit/pltbm/nearby?'.
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578');

        $response->dump();
    }
}
