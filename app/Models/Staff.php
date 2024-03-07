<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property string $name
 * @property string $image
 * @property string $number
 * @property string $email
 * @property string $website
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Translation[] $translations
 */
class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $guarded = ['id'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
}
