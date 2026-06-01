<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
    'user_id',

    'nama_anak',
    'nama_orang_tua',
    'email',
    'no_hp',
    'alamat',
    'jenjang',
    'mata_pelajaran',
    'jenis_kelamin',

    'status',
];
}
