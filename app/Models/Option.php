<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Option extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'logo',
        'favicon',
        'phone',
        'email',
        'address',
        'whatsapp',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('cover')
            ->fit(Manipulations::FIT_CROP, 1440, 300)
            ->nonQueued();
    }
}
