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
class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
}
