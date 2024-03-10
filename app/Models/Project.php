<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @package App\Models
 *
 * @property int $id
 * @property string $image
 * @property string $date
 * @property string $name
 * @property bool $is_finished
 * @property int $category_id
 * @property string $created_at
 * @property string $updated_at
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'date',
        'name',
        'is_finished',
        'category_id',
    ];

    protected $casts = [
        'is_finished' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'project_facilities', 'project_id', 'facility_id')
            ->withPivot('value');
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }

    /**
     * Sync facilities for the project.
     *
     * This method synchronizes the facilities associated with the project based on the provided array of facilities.
     * It updates existing project facilities with new values and creates new project facilities if they don't exist.
     * It also deletes project facilities that are not present in the provided facilities array.
     *
     * @param array $facilities The array of facilities to sync.
     * @return void
     */
    public function syncFacilities(array $facilities): void
    {
        $existingFacilityIds = $this->facilities->pluck('id')->toArray();

        // Filter unique facilities based on facility_id
        $uniqueFacilities = collect($facilities)->keyBy('facility_id')->toArray();

        foreach ($uniqueFacilities as $facilityId => $facility) {
            $existingProjectFacility = ProjectFacility::where('project_id', $this->id)
                ->where('facility_id', $facilityId)
                ->first();

            if ($existingProjectFacility) {
                $existingProjectFacility->update(['value' => $facility['value']]);
            } else {
                ProjectFacility::create([
                    'project_id' => $this->id,
                    'facility_id' => $facilityId,
                    'value' => $facility['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Remove the facility from the list of existing facility IDs
            $key = array_search($facilityId, $existingFacilityIds);
            if ($key !== false) {
                unset($existingFacilityIds[$key]);
            }
        }

        // Delete project facilities that are not present in the provided facilities array
        if (!empty($existingFacilityIds)) {
            ProjectFacility::where('project_id', $this->id)
                ->whereIn('facility_id', $existingFacilityIds)
                ->delete();
        }
    }
}
