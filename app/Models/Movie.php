<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class Movie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = false;

    public function genres (): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function registerMediaCollections (): void
    {
        $this->addMediaCollection('movies')
            ->useFallbackUrl('http://127.0.0.1:8000/images/default/def.jpg')
            ->useFallbackPath(public_path('/images/default/def.jpg'));
    }

    protected static function booted ()
    {
        static::created(function ($record) {

        });
    }
}
