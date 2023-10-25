<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembangkit extends Model
{
    use SoftDeletes;
    protected $table = "pembangkit";
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'longitude',
        'latitude',
        'deskripsi',
        'lokasi',
        'kapasitas',
        'gambar'
    ];



    private function formatTemplate() : array
    {
        return [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => [
                    (double) $this->longitude,
                    (double) $this->latitude
                ]
            ],
            "properties" => [
                "id" => $this->id,
                "name" => $this->nama,
                'deskripsi' => $this->deskripsi,
                'lokasi' => $this->lokasi,
                'kapasitas' => $this->kapasitas,
                'gambar' => $this->gambar
            ]
        ];
    }


    public function plta() {
        return $this->hasOne(PLTA::class, 'id_pl', 'id');
    }
    public function formatPLTA()
    {
        $format = $this->formatTemplate();
        $format["properties"]["unit_generator"] = $this->unit_generator;
        $format["properties"]["jenis_generator"] =  $this->jenis_generator;

        return $format;
    }


    public function plts() {
        return $this->hasOne(PLTS::class, 'id_pl', 'id');
    }
    public function formatPLTS()
    {
        $format = $this->formatTemplate();
        $format["properties"]["unit_panel"] = $this->unit_panel;
        return $format;
    }


    public function pltp()
    {
        return $this->hasOne(PLTP::class, 'id_pl', 'id');
    }
    public function formatPLTP()
    {
        $format = $this->formatTemplate();
        $format["properties"]["tipe_pembangkit"] = $this->unit_panel;
        $format["properties"]["unit_pembangkit"] = $this->unit_pembangkit;
        return $format;
    }


    public function pltb()
    {
        return $this->hasOne(PLTB::class, 'id_pl', 'id');
    }
    public function formatPLTB()
    {
        $format = $this->formatTemplate();
        $format["properties"]["unit_turbin"] = $this->unit_turbin;
        $format["properties"]["tipe_turbin"] = $this->tipe_turbin;
        return $format;
    }


    public function pltbm()
    {
        return $this->hasOne(PLTBm::class, 'id_pl', 'id');
    }
    public function formatPLTBm()
    {
        $format = $this->formatTemplate();
        $format["properties"]["sumber_energi"] = $this->sumber_energi;
        return $format;
    }


    public function pltm()
    {
        return $this->hasOne(PLTM::class, 'id_pl', 'id');
    }
    public function formatPLTM()
    {
        $format = $this->formatTemplate();
        return $format;
    }


    public function pltmh()
    {
        return $this->hasOne(PLTMH::class, 'id_pl', 'id');
    }
    public function formatPLTMH()
    {
        $format = $this->formatTemplate();
        return $format;
    }
}
