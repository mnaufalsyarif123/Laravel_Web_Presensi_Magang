<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Presensi extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';  // Tentukan bahwa uuid adalah primary key
    protected $keyType = 'string';    // UUID adalah string
    public $incrementing = false;     // Nonaktifkan auto-increment

    protected $fillable = [
        'user_uuid', 'tanggal', 'waktu_check_in', 'foto_bukti_check_in',
        'waktu_check_out', 'keterangan_harian', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    // Memastikan UUID ditetapkan sebelum menyimpan data
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();  // Generate UUID baru saat data baru dibuat
        });
    }
}
