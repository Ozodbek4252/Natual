<?php

namespace App\Http\Requests;

use App\Models\Lang;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->_method == 'PUT') {
            $icon = 'nullable|image|mimes:jpeg,png,jpg';
        } else {
            $icon = 'required|image|mimes:jpeg,png,jpg';
        }

        $rules = [
            'icon' => $icon,
        ];

        $langs = Lang::where('is_published', true)->get();
        foreach ($langs as $lang) {
            $rules['title_' . $lang->code] = 'required|string';
            $rules['description_' . $lang->code] = 'required|string';
        }

        return $rules;
    }
}
