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
        'waktu_pelatihan'
    ];

    public function temaPelatihan()
    {
        return $this->belongsTo(TemaPelatihan::class, 'tema_id');
    }
}
