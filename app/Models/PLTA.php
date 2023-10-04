<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTA extends Model
{
    protected $table = 'pltas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id_pl',
        'tipe_pembangkit',
        'unit_pembangkit'
    ];

    public function pembangkit() {
        return $this->hasOne(Pembangkit::class);
    }

}
