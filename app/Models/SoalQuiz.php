<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoalQuiz extends Model
{
    use SoftDeletes;
    protected $table = 'soalquiz';
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $timestamps = true;

    protected array $date = ['deleted_at'];

    protected $casts = [
        'pilihan' => 'array'
    ];

    protected $fillable = [
        'kode',
        'pertanyaan',
        'pilihan',
        'jawaban'
    ];

}
