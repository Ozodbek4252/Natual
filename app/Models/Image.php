<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@package App\Models
 *
 * @property string $id
 * @property string $path
 * @property string $imageable_id
 * @property string $imageable_type
 * @property string $type
 * @property string $size
 * @property string $mime_type
 * @property string $extension
 * @property string $created_at
 * @property string $updated_at
 *
 * @property-read string $full_path
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type',
        'type',
        'size',
        'mime_type',
        'extension',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getFullPathAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
