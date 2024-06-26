<?php

declare(strict_types=1);

namespace App\ViewModels\Project;

use App\Models\Category;
use App\ViewModels\BaseViewModel;
use Illuminate\Support\Collection;

class ProjectViewModel extends BaseViewModel
{
    public int $id;
    public ?string $image;
    public $new_image;
    public $images;
    public $image_medium;
    public $image_thumbnail;
    public $image_original;
    public string $date;
    public string $name;
    public string $country;
    public int $category_id;
    public Category $category;
    public ?bool $is_finished;

    public array $facilities;
    public array $translations;

    protected function populate(): void
    {
        $this->id = $this->_data->id;
        $this->image = $this->_data->image;
        $this->date = $this->_data->date;
        $this->name = $this->_data->name;
        $this->country = $this->_data->country;
        $this->category_id = $this->_data->category_id;
        $this->category = Category::find($this->_data->category_id);
        $this->is_finished = $this->_data->is_finished;
        $this->images = $this->_data->images;

        $this->translations = $this->getTranslations($this->_data->translations);
        $this->setFacilities();

        $images = collect($this->images)->groupBy('type')->map(function ($image) {
            return $image->first();
        });
        $this->images = $images;
        $this->image_medium = isset($this->images['medium']) ? $this->images['medium']->full_path : null;
        $this->image_thumbnail = isset($this->images['thumbnail']) ? $this->images['thumbnail']->full_path : null;
        $this->image_original = isset($this->images['original']) ? $this->images['original']->full_path : null;

        $this->new_image = $this->image_medium ?? $this->image_original ?? $this->image_thumbnail ?? null;
    }

    /**
     * Set facilities data.
     *
     * This method sets the facilities data by mapping the facilities
     * retrieved from the data object and extracting the necessary fields.
     * It converts the mapped facilities data into an array.
     *
     * @return void
     */
    private function setFacilities()
    {
        $this->facilities = $this->_data->facilities->map(function ($facility) {
            return [
                'id' => $facility->id,
                'value' => $facility->pivot->value,
            ];
        })->toArray();
    }

    /**
     * Get translations from a collection.
     *
     * @param \Illuminate\Support\Collection $collection
     * @return array
     */
    private function getTranslations(Collection $collection): array
    {
        // Group the collection by language code
        $groupedByLang = $collection->groupBy(function ($item) {
            return $item->lang->code;
        });

        // Map each group to group by column name and return only the first item
        $mapped = $groupedByLang->map(function ($group) {
            return $group->groupBy('column_name')->map->first();
        });

        // Convert the mapped collection to array
        return $mapped->toArray();
    }
}
