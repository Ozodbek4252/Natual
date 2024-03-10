<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @property int $id
 * @property int $project_id
 * @property int $facility_id
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class ProjectFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'facility_id',
        'value',
    ];

    protected $casts = [
        'id' => 'int',
        'project_id' => 'int',
        'facility_id' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
