<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $link
 * @property bool $is_published
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Translation[] $translations
 * @property Image[]|Collection $images
 */
class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'is_published',
        'image',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
