<?php

declare(strict_types=1);

namespace App\ViewModels\AboutCompany;

use App\ViewModels\BaseViewModel;
use Illuminate\Support\Collection;

class AboutCompanyViewModel extends BaseViewModel
{
    public int $id;
    public string $image;

    public array $translations;
    public array $images;
    public array $certificates;

    protected function populate(): void
    {
        $this->id = $this->_data->id;
        $this->image = $this->_data->image;

        $this->translations = $this->getTranslations($this->_data->translations);
        $this->setImagesAndCertificates();
    }

    private function setImagesAndCertificates(): void
    {
        $files = collect($this->_data->files)->groupBy('type');

        $this->images = $files['image']->toArray();
        $this->certificates = $files['certificate']->toArray();
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
