<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';  // Tentukan bahwa uuid adalah primary key
    protected $keyType = 'string';    // UUID adalah string
    public $incrementing = false;     // Nonaktifkan auto-increment

    protected $fillable = [
        'name_role', 'status_role'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
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
