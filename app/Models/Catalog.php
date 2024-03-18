<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 */
class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'catalogs';
}
