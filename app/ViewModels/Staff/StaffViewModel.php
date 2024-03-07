<?php

declare(strict_types=1);

namespace App\ViewModels\Staff;

use App\ViewModels\BaseViewModel;
use Illuminate\Support\Collection;

class StaffViewModel extends BaseViewModel
{
    public int $id;
    public string $name;
    public ?string $image;
    public ?string $number;
    public ?string $email;
    public ?string $website;

    public array $translations;

    protected function populate(): void
    {
        $this->id = $this->_data->id;
        $this->name = $this->_data->name;
        $this->image = $this->_data->image;
        $this->number = $this->_data->number;
        $this->email = $this->_data->email;
        $this->website = $this->_data->website;

        $this->translations = $this->getTranslations($this->_data->translations);
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
