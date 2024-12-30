<?php

// app/Models/ActivityLog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ActivityLog extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';  // Tentukan bahwa uuid adalah primary key
    protected $keyType = 'string';    // UUID adalah string
    public $incrementing = false;     // Nonaktifkan auto-increment

    protected $fillable = [
        'tanggal', 'waktu_check_in', 'foto_bukti_check_in', 
        'waktu_check_out', 'keterangan_harian', 'status', 
        'username', 'nim_nisn', 'nama_lengkap', 'foto_profile',
        'foto_ktm', 'surat_pengantar', 'surat_diterima_magang', 
        'asal_sekolah_universitas', 'jurusan_prodi', 'kelas_semester',
        'tanggal_mulai_magang', 'tanggal_berakhir_magang', 'satker',
        'no_hp', 'alamat', 'jenis_kelamin', 'status_magang'
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

