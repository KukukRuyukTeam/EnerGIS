<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PembangkitTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected function testInsertSuccess(): void
    {
        $this->post('/api/pembangkit', [
            'nama' => 'PLTA Bogor',
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
                    'nama',
                    'longitude',
                    'latitude',
                    'deskripsi',
                    'lokasi',
                    'kapasitas',
                    'gambar'
                ]
            ]);
    }

    public function testInsertFailed(): void
    {
        $this->post('/api/pembangkit', [
            'nama' => 'PLTA Bogor',
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
