<?php

declare(strict_types=1);

namespace App\ViewModels\Project;

use App\Models\Category;
use App\ViewModels\BaseViewModel;
use Illuminate\Support\Collection;

class IndexProjectViewModel extends BaseViewModel
{
    public int $id;
    public string $image;
    public string $date;
    public string $name;
    public int $category_id;
    public Category $category;
    public $categoryTranslations;
    public ?bool $is_finished;

    public array $facilities;
    public array $translations;

    protected function populate(): void
    {
        $this->id = $this->_data->id;
        $this->image = $this->_data->image;
        $this->date = $this->_data->date;
        $this->name = $this->_data->name;
        $this->category_id = $this->_data->category_id;
        $this->category = Category::find($this->_data->category_id);
        $this->is_finished = $this->_data->is_finished;

        $this->setCategory();
        $this->translations = $this->getTranslations($this->_data->translations);
    }

    private function setCategory()
    {
        $category = Category::with('translations.lang')->find($this->_data->category_id);
        $this->categoryTranslations = $this->getTranslations($category->translations);
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
