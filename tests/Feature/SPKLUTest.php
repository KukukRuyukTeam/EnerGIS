<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SPKLUTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertSuccess()
    {
        $response = $this->post('/api/spklu', [
            'nama' => "SPKLU Pajajaran",
            'lokasi' => "Jln Pajajaran no.999 Kota Bogor",
            'longitude' => -6.589169556757834,
            'latitude' => 106.8061123132633,
            'gambar' => "testGambar.png",
            'ports' => [
                [
                    'tipe' => "Type C",
                    'jumlah' => 1,
                    'daya' => 50
                ],
                [
                    'tipe' => "Type B",
                    'jumlah' => 2,
                    'daya' => 50
                ]
            ]
        ]);
//        $response->dump();
        return $response['spklu'];
    }

    public function testUpdateSuccess()
    {
        $spklu = $this->testInsertSuccess();
        $response = $this->put('/api/spklu/' . $spklu['id'], [
            'nama' => "SPKLU Pajajaran",
            'lokasi' => "Jln Pajajaran no.999 Kota Bogor",
            'longitude' => -6.589169556757837,
            'latitude' => 106.8061123132633,
            'gambar' => "testGambar.png",
            'ports' => [
                [
                    'id' => $spklu['ports'][0]['id'],
                    'tipe' => "Type D",
                    'jumlah' => 1,
                    'daya' => 50
                ],
            ]
        ]);

        $response->dump();
    }

    public function testDeleteSuccess()
    {
        $spklu = $this->testInsertSuccess();
        $response = $this->delete('/api/spklu/' . $spklu['id']);
        $response->dump();
    }

    public function testFindNearby()
    {
        $this->testInsertSuccess();
        $response = $this->get('/api/spklu/nearby?' .
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578');
        echo $response->dump();
    }

    public function testFindQuery()
    {
        $this->testInsertSuccess();
        $response = $this->get('/api/spklu/query/spklu');
        $response->dump();
    }

}
