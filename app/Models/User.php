<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class User extends Model
{
    use HasFactory;

    // Menggunakan UUID sebagai primary key
    protected $primaryKey = 'uuid';  // Tentukan bahwa uuid adalah primary key
    protected $keyType = 'string';    // Pastikan Laravel tahu bahwa UUID adalah string
    public $incrementing = false;     // Nonaktifkan auto-increment

    // Menetapkan field yang dapat diisi
    protected $fillable = [
        'username', 'password', 'nim_nisn', 'nama_lengkap', 'foto_profile', 
        'foto_ktm', 'surat_pengantar', 'surat_diterima_magang', 
        'asal_sekolah_universitas', 'jurusan_prodi', 'kelas_semester', 
        'tanggal_mulai_magang', 'tanggal_berakhir_magang', 'satker', 
        'no_hp', 'alamat', 'jenis_kelamin', 'status_magang',
    ];

    // Relasi ke Presensi (User memiliki banyak Presensi)
    public function presensis()
    {
        return $this->hasMany(Presensi::class, 'user_uuid', 'uuid');
    }

    // Relasi ke Role (User memiliki satu Role)
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
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
