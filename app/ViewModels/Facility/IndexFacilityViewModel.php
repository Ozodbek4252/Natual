<?php

declare(strict_types=1);

namespace App\ViewModels\Facility;

use App\ViewModels\BaseViewModel;
use Illuminate\Support\Collection;

class IndexFacilityViewModel extends BaseViewModel
{
    public int $id;
    public string $image;

    public array $translations;

    protected function populate(): void
    {
        $this->id = $this->_data->id;
        $this->image = $this->_data->image;

        $this->translations = $this->getTranslations($this->_data->translations);
    }

    private function getTranslations(Collection $collection): array
    {
        $collection = $collection->filter(function ($item) {
            return $item->lang->code == 'ru';
        });

        $collection = $collection->groupBy('column_name');

        $collection = $collection->map(function ($item) {
            return $item[0];
        });

        return $collection->toArray();
    }
}
