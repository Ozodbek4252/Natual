<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $image
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Translation[] $translations
 */
class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'link',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
}
