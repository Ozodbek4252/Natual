<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
