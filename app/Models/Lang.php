<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $icon
 * @property bool $is_published
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Lang extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'icon',
        'is_published',
    ];
}
