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

    public function plta() {
        return $this->hasOne(PLTA::class, 'id_pl', 'id');
    }

    public function plts() {
        return $this->hasOne(PLTS::class, 'id_pl', 'id');
    }

    public function pltp()
    {
        return $this->hasOne(PLTP::class, 'id_pl', 'id');
    }

    public function pltb()
    {
        return $this->hasOne(PLTB::class, 'id_pl', 'id');
    }

    public function pltbm()
    {
        return $this->hasOne(PLTBm::class, 'id_pl', 'id');
    }

    public function pltm()
    {
        return $this->hasOne(PLTM::class, 'id_pl', 'id');
    }

    public function pltmh()
    {
        return $this->hasOne(PLTMH::class, 'id_pl', 'id');
    }
}
