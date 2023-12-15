<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'User';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username', 'password', 'role', 'nama_karyawan'];
}
