<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SPKLU extends Model
{
    use SoftDeletes;
    protected $table = 'spklu';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;
    protected array $date = ['deleted_at'];

    protected $fillable = [
        'nama',
        'lokasi',
        'latitude',
        'longitude',
        'gambar'
    ];

    public function spklu_port()
    {
        return $this->hasMany(SPKLUPort::class, 'id_spklu', 'id');
    }
}
