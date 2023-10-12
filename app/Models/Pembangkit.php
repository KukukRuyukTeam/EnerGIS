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
        $this->belongsTo(PLTA::class);
    }

    public function plts() {
        $this->belongsTo(PLTS::class);
    }
}
