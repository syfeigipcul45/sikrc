<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'tema_id',
        'email',
        'no_hp',
        'pesan',
        'is_published'
    ];

    public function temaPelatihan()
    {
        return $this->belongsTo(TemaPelatihan::class, 'tema_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i:s');
    }
}
