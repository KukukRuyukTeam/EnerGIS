<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PLTA extends Model
{
    use SoftDeletes;
    protected $table = 'plta';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;
    protected array $date = ['deleted_at'];

    protected $fillable = [
        'id_pl',
        'tipe_pembangkit',
        'unit_pembangkit'
    ];

    public function pembangkit() {
        return $this->belongsTo(Pembangkit::class, 'id', 'id_pl');
    }

}
