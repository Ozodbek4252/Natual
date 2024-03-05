<?php

namespace App\Livewire;

use App\Models\Locale;
use Livewire\Component;

class StoreLocale extends Component
{
    public $code, $name, $is_published;

    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|min:2', // Adjust max length as needed
        'is_published' => 'nullable|boolean',
    ];

    public function store()
    {
        $this->validate();

        Locale::create([
            'name' => $this->name,
            'code' => $this->code,
            'is_published' => $this->is_published ?? false
        ]);

        toastr('Created successfully!', 'success');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.modals.locale-store');
    }
}
