<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'Karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = ['nama_karyawan'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_karyawan', 'id_karyawan');
    }
}
