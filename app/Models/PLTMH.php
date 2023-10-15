<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PLTMH extends Model
{
    use SoftDeletes;
    protected $table = 'pltmh';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;
    protected array $date = ['deleted_at'];

    protected $fillable = [
        'id_pl'
    ];

    public function pembangkit() {
        return $this->hasOne(Pembangkit::class, 'id', 'id_pl');
    }
}
