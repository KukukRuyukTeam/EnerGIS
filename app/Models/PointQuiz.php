<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointQuiz extends Model
{
    use SoftDeletes;
    protected $table = 'pointquiz';
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $timestamps = true;

    protected array $date = ['deleted_at'];

    protected $fillable = [
        'kode_soal',
        'nama',
        'jumlah',
    ];

//    public function soalquiz(): HasMany
//    {
//        return $this->hasMany(SoalQuiz::class, 'kode', 'kode_soal');
//    }

}
