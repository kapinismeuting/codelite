<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Image extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'caption',
        'alt_text',
        'description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    /**
     * Get all media items for the post.
     *
     * @param string $collectionName
     * @return \Spatie\MediaLibrary\MediaCollections\Models\Media
     */
    public function getMediaItems(string $collectionName = 'images')
    {
        return $this->getMedia($collectionName);
    }
}
