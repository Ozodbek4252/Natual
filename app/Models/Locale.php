<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Model
 *
 * @property string $code
 * @property string $name
 * @property bool $is_published
 */
class Locale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
