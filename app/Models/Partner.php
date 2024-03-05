<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $logo
 * @property string $name
 * @property string $created_at
 * @property string $deleted_at
 */
class Partner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
