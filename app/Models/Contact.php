<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property string $title
 * @property string $value
 * @property string @created_at
 * @property string @updated_at
 */
class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
