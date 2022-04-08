<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelatihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tema_id',
        'lokasi_pelatihan',
        'waktu_pelatihan',
        'jam_mulai',
        'jam_berakhir',
        'peserta',
        'file_undangan'
    ];

    public function temaPelatihan()
    {
        return $this->belongsTo(TemaPelatihan::class, 'tema_id');
    }
}
