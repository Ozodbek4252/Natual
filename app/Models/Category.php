<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $image
 * @property bool $is_local
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Translation[]|Collection $translations
 * @property Project[]|Collection $projects
 * @property Image[]|Collection $images
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
