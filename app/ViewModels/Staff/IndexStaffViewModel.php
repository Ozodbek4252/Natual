<?php

declare(strict_types=1);

namespace App\ViewModels\Staff;

use App\ViewModels\BaseViewModel;
use Illuminate\Support\Collection;

class IndexStaffViewModel extends BaseViewModel
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
