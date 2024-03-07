<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Translation[] $translations
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
}
