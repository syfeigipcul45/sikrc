<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AlumniKrc extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name', 
        'tempat_lahir', 
        'tanggal_lahir',
        'alamat', 
        'instansi', 
        'no_hp',
        'tema_id'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('avatar')
            ->width(240)
            ->height(300)
            ->sharpen(10);
    }

    public function temaPelatihan()
    {
        return $this->belongsTo(TemaPelatihan::class, 'tema_id');
    }
}
