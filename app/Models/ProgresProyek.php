<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresProyek extends Model
{
    use HasFactory;

    protected $table = 'progres_proyek'; // nama tabel di database

   protected $fillable = [
    'nama_proyek',
    'deskripsi',
    'persentase',
    'tanggal_mulai',
    'tanggal_selesai',
    'foto',
];

}
