<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PLTATest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertSuccess(): void
    {
        $response = $this->post('/api/pembangkit/plta', [
            'nama' => 'PLTA Bogor',
            'tipe_pembangkit' => 'Generator',
            'unit_pembangkit' => 'Generator 1',
            'longitude' => -6.589169556757834,
            'latitude' => 106.8061123132633,
            'deskripsi' => "Adalah PLTA",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertStatus(201)
            ->assertJsonStructure([  // Bisa juga cek id kalau tidak kosong
                "data" => [
                    'id',
                    'id_pl',
                    'tipe_pembangkit',
                    'unit_pembangkit',
                    'pembangkit'
                ]
            ]);

//        $response->dump();
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
}
