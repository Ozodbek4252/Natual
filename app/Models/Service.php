<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at

 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
    ];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }
}
