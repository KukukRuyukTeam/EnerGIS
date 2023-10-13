<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SPKLUPort extends Model
{
    use SoftDeletes;
    protected $table = 'spklu_port';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;
    protected array $date = ['deleted_at'];

    protected $fillable = [
        'id_spklu',
        'tipe',
        'daya',
        'jumlah'
    ];
}
